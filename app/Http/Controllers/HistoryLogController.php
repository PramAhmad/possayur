<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\QueryBuilder\QueryBuilder;

class HistoryLogController extends Controller
{
    public function index(Request $request){
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'History Log',
                'url' => route('history-log.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $historys = QueryBuilder::for(Activity::class)
            ->allowedSorts(['created_at'])
            ->where('description', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

// return $historys;
        return view('history-log.index', [
            'historys' => $historys,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'History Log'
        ]);
    }
}
