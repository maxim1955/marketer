<?php

// app/Http/Controllers/RouteSheetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouteSheet;
use App\Models\Application;
use App\Models\User;
use App\Models\Statuses;
use App\Models\Organization;
use App\Models\RouteSheetApplications;

class RouteSheetController extends Controller
{
    public function createRouteSheet(Request $request)
    {
        $routeSheetData = $request->input('routeSheetData');
        
        $authorName = auth()->user()->name;
        $organizationName = $request->input('organizationName');
        $timeInput = $request->input('timeInput');
        $dateForApplication = $request->input('dateForApplication');
        $metrologName = $request->input('metrologName');
        $statusName = $request->input('statusName');
        $routeSheetNumber = $request->input('routeSheetNumber');

        // Создаем новый маршрутный лист
        $routeSheet = RouteSheet::create([
            'route_sheet_number' => $routeSheetNumber,
            'current_date_time' => now(),
            'author' => $authorName,
            'organization' => $organizationName,
            'time_input' => $timeInput,
            'completion_date' => $dateForApplication,
            'metrolog' => $metrologName,
            'status' => $statusName
        ]);

        // Связываем заявки с маршрутным листом
        foreach ($routeSheetData as $row) {
            $application = Application::where('id', $row['requestId'])->first();
            
            if ($application) {
                $routeSheet->applications()->attach($application);
            }
        }

        return response()->json(['success' => true, 'message' => 'Маршрутный лист успешно создан']);
    }

    public function saveRouteSheetApplications($order, $pageNumber) 
    {   
        // Шаг 1: Получаем id из таблицы RouteSheet по номеру страницы
        $routeSheetId = RouteSheet::where('route_sheet_number', $pageNumber)->value('id');
        $order = array_map('intval', $order);
    
        if ($routeSheetId) 
        {
            // Шаг 2: Получаем application_id из таблицы RouteSheetApplications для указанного route_sheet_id
            $applications = RouteSheetApplications::where('route_sheet_id', $routeSheetId)
                ->orderBy('id') // Добавим сортировку для предотвращения возможных проблем с порядком
                ->get();
    
            // Шаг 3: Проверяем, что размеры обоих массивов совпадают
            if (count($order) === count($applications)) 
            {
                // Шаг 4: Обновляем порядок application_id в таблице RouteSheetApplications согласно новому порядку
                foreach ($order as $newIndex => $applicationId) 
                {   
                    $application = $applications[$newIndex];
                    $application->update(['application_id' => $order[$newIndex]]);
                }
    
                // Возвращаем успешный результат
                return response()->json(['success' => 'Данные успешно обновлены', 'order' => $order]);
            } 
            else 
            {
                // Если размеры массивов не совпадают
                return response()->json(['success' => false, 'message' => 'Arrays have different sizes']);
            }
        } 
        else 
        {
            // Если не найден route_sheet_id для указанного номера страницы
            return response()->json(['success' => false, 'message' => 'RouteSheet not found for the specified page number']);
        }

    }

   

    public function viewRouteSheet($route_sheet_number)
    {   

        $users = $this->getUsersWithRoleIdTwo();
        $status = $this->getStatuses();
        $organization = $this->getOrganization();


        // Шаг 1: Получаем id из таблицы RouteSheet по номеру страницы
        $routeSheet = RouteSheet::where('route_sheet_number', $route_sheet_number)->first();

        if ($routeSheet) {
            // Шаг 2: Получаем route_sheet_id из таблицы RouteSheetApplications для указанного route_sheet_id
            $applications = RouteSheetApplications::where('route_sheet_id', $routeSheet->id)->get();
            // dd($applications);
            // Шаг 3: Получаем данные по application_id из таблицы Application
            $applicationData = [];
            foreach ($applications as $application) 
            {
                $applicationDetails = Application::find($application->application_id);
                if ($applicationDetails) 
                {
                    $applicationData[] = $applicationDetails;
                }
            }

            // dd($applicationData);

            // Здесь вы можете передать данные в вид и отобразить страницу просмотра
            return view('viewRouteSheet', [
                'routeSheet' => $routeSheet,
                'applications' => $applicationData,
                'organization' => $organization, 
                'status' => $status,
                'users' => $users,
            ]);
        } else {
            // Если не найден route_sheet_id для указанного номера страницы
            return response()->json(['success' => false, 'message' => 'RouteSheet not found for the specified page number']);
        }
    }

    public function getUsersWithRoleIdTwo()
    {
        return User::where('role_id', 2)->get();
    }

    public function getStatuses()
    {
        return Statuses::all();
    }

    public function getOrganization()
    {
        return Organization::all();
    }

}
