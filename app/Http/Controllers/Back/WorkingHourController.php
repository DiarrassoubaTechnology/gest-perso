<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\IrTimeWork;
use App\Models\IrWorkClock;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WorkingHourController extends Controller
{
    //page index
    function pageHourAppointment(){

        // Obtenez la date et l'heure actuelle
        $dateHeure = Carbon::now();

        if (Auth::check()) {
            
            $title = "Pointer votre présence";
            
            $under_title = "Pointage";
            
            $load_file_clockTime = true;

            //Recupere le pointage du jour de l'utilisateur
            $id_user = Auth::user()['employees_id'];
            $pointageDay = IrTimeWork::where('employe_id', $id_user)
                ->where('day_of_date', $dateHeure->format('Y-m-d'))
                ->first();

            // Recuperons les heures de travail de l'entreprise
            $workHours = IrWorkClock::where('status_id', 3)
                ->get()->toArray();

            $remaining_time = 0;
            $working_time = 0;

            if ($pointageDay) {
                
                // Verifons si l'employé est dans le temps ou retard
                // Tout d'abord vérifions quel jour nous sommes
                $dayJ = $pointageDay['day_of_date']->format('l');

                // Obtenez la date d'aujourd'hui
                $today = Carbon::today();

                // Récupérez le samedi passé (le samedi précédent)
                $saturday = $today->previous(Carbon::SATURDAY);

                //verifons si on a travaillé a la de samedi
                $verifSaturdayWork = IrTimeWork::where('employe_id', $id_user)
                ->where('day_of_date', $saturday->toDateString())
                ->first();

                # Calculons le nombre d'heure de retard...
                if ($dayJ == 'Saturday') {
                    $start_work_clock = $workHours[1]['start_work_clock'];
                    $end_work_clock = $workHours[1]['end_work_clock'];
                } elseif ($dayJ == 'Monday' && !empty($verifSaturdayWork)) {
                    $start_work_clock = $workHours[2]['start_work_clock'];
                    $end_work_clock = $workHours[2]['end_work_clock'];
                } else {
                    $start_work_clock = $workHours[0]['start_work_clock'];
                    $end_work_clock = $workHours[0]['end_work_clock'];
                }

                $retardFormate = 0;

                // Assurez-vous que les deux variables sont des objets Carbon
                $startWorkClock = Carbon::parse($start_work_clock);  // Convertir $start_work_clock en objet Carbon
                $pointageTime = Carbon::parse($pointageDay['start_time']);  // Convertir $pointageDay['start_time'] en objet Carbon

                // Vérifier si l'heure de pointage est après l'heure de début du travail
                if ($pointageTime > $startWorkClock) {
                    // Calculer le retard
                    $retard = $startWorkClock->diffInMinutes($pointageTime);  // Différence en minutes
                    
                    // Calculer le retard en heures et minutes
                    $retardHeures = floor($retard / 60);  // Heures
                    $retardMinutes = $retard % 60;  // Minutes restantes

                    // Format du retard (par exemple "01:30" pour 1 heure et 30 minutes)
                    $retardFormate = sprintf('%02d:%02d', $retardHeures, $retardMinutes);
                }

            }          

            // Merci pour votre ponctualité.
                
            return view('pages.appointment.index', compact(
                'title','under_title','dateHeure','load_file_clockTime',
                'pointageDay','workHours','start_work_clock','end_work_clock','retardFormate'
            ));

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    function functionPointTheTime(Request $request){
        if (Auth::check()) {

            $dateHeure = Carbon::now();

            // Informations la position de geographique de l'entreprise
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            
            // Vérifiez les coordonnées géographiques 
            if ($this->isInOffice($latitude, $longitude)) { 
                // L'utilisateur est dans l'entreprise
                $date = $dateHeure->format('Y-m-d');
                $heure = $dateHeure->format('H:i:s');

                $id_user = Auth::user()['employees_id'];

                // verifions si l'utilisateur a déjà pointé
                $pointage = IrTimeWork::where('employe_id', $id_user)
                    ->where('day_of_date', $date)
                    ->first();

                if ($pointage) {
                    return response()->json(['error' => 'Vous avez déjà pointé votre présence']);
                }

                // enregister le pointage
                $pointage = new IrTimeWork();
                $pointage->day_of_date = $date;
                $pointage->employe_id = $id_user;
                $pointage->start_time = $heure;
                $pointage->status_id = 1;
                $pointage->created_at = $dateHeure;
                $pointage->save();

                // retourner un message de succès
                return response()->json(['success' => 'Pointage effectué avec succès']);

            } else { 
                return response()->json(['error' => 'Vous ne pouvez pas pointer votre présence en dehors de l\'entreprise']); 
            }


        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return response()->json(['error' => 'Vous devez vous connecter pour pointer votre présence']);
        }
    }

    function functionEndTheDay(Request $request){
        if (Auth::check()) {

            $dateHeure = Carbon::now();
            
            $id_user = Auth::user()['employees_id'];
            $date = $dateHeure->format('Y-m-d');

            // verifions si l'utisateur a pointé pour la journée
            $pointToDay = IrTimeWork::where('employe_id', $id_user)
            ->where('day_of_date', $date)
            ->first();

            // Vérifiez si non vide
            if ($pointToDay) { 
                // L'utilisateur est dans l'entreprise
                $heure = $dateHeure->format('H:i:s');

                $id_user = Auth::user()['employees_id'];

                // mise à jour de date de fin de la journée
                if(IrTimeWork::where('employe_id', $id_user)->where('day_of_date', $date)->update(
                    [
                        'end_time' => $heure,
                        'updated_at' => date('Y/m/d H:i:s'),
                    ]
                )){
                        
                    return response()->json([
                        'success' => "Merci pour votre présence aujourd'hui. Bonne fin de journée et à bientôt !",
                    ]);

                } else {
                    return response()->json([
                        'error' => "Erreur dans votre demande. Merci de réessayer!",
                    ]);
                }

            } else { 
                return response()->json(['error' => 'Pointage manquant. Merci de bien vouloir effectuer votre pointage dès que possible.']); 
            }


        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return response()->json(['error' => 'Vous devez vous connecter pour pointer votre présence']);
        }
    }

    //page history
    function pageHistoryHour(){
        if (Auth::check()) {

            $title = "Historique horaire de travail";
            
            $under_title = "Pointage";

            $load_liste_history_hours = true;

            return view('pages.appointment.history', compact('title','under_title','load_liste_history_hours'));

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }

    //page index
    function pageReportAppointment(){
        if (Auth::check()) {

            $title = "Pointer votre présence";
            
            $under_title = "Pointage";

            return view('pages.appointment.index', compact('title','under_title'));

        } else {
            // L'utilisateur n'est pas authentifié (déconnecté)
            return redirect()->route('/');
        }
    }


    private function isInOffice($latitude, $longitude) { 
        // Coordonnées du bureau 
        $officeLatitude = '5.380693'; 
        // Exemple de latitude 
        $officeLongitude = '-3.994982'; 
        // Exemple de longitude 
        // Vérifiez si les coordonnées sont à moins de 100 mètres du bureau 
        $distance = $this->calculateDistance($latitude, $longitude, $officeLatitude, $officeLongitude); 
        
        return $distance <= 100; 
    } 
    
    private function calculateDistance($lat1, $lon1, $lat2, $lon2) { 
        //earthRadius représente le rayon de la Terre, utilisé pour calculer les distances entre deux points géographiques 
        //(latitude et longitude) sur la surface de la Terre. 
        //Le rayon de la Terre est d'environ 6,371 kilomètres ou 6,371,000 mètres.
        $earthRadius = 6371000; 

        // Rayon de la Terre en mètres 
        $dLat = deg2rad($lat2 - $lat1); $dLon = deg2rad($lon2 - $lon1); 
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2); 
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); $distance = $earthRadius * $c; 
        // Distance en mètres 
        return $distance;
    }
}
