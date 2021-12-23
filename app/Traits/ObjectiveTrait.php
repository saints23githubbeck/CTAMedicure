<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\KeyResult;
use App\Models\Objective;
use App\Models\ObjectiveTeam;
use App\Models\KeyResultMetric;
use App\Models\ObjectiveMetric;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * ObjectiveTrait
 */
trait ObjectiveTrait
{
  public function getUserObjectives($id = null)
  {
    if ($id) {
      return Objective::with(
        'metric',
        'user.profile',
        'keyResults.krMetric',
        'keyResults.user.profile'
      )
        ->find($id);
    }
    return Objective::with(
      'metric',
      'user.profile',
      'keyResults.krMetric',
      'keyResults.user.profile'
    )
      ->where('user_id', auth()->user()->id)
      ->orderByDesc('created_at')
      ->get();

  }
  public function getOrganizationObjectives()
  {
    return Objective::with(
      'metric',
      'user.profile',
      'keyResults.krMetric',
      'keyResults.user.profile'
    )
      ->where('type', "organization")
      ->where('company_id', auth()->user()->company_id)
      ->orderByDesc('created_at')
      ->get();
  }
  public function getTeamObjectives($team)
  {
    return Team::with(
      'objectives',
      'objectives.user.profile',
      'objectives.metric',
      'objectives.keyResults.krMetric',
      'objectives.keyResults.user.profile'

    )

        ->orderByDesc('created_at')

      ->find($team);


  }




  public function getKeyResult($id)
  {
    return KeyResult::with('user.profile', 'krMetric')->find($id);
  }

    public function totalOkrs()
    {

        return Objective::where('user_id',auth()->user()->id)->count();
    }

    public function totalCompanyOkrs()
    {

        return Objective::where('type','organization')->where('company_id',auth()->user()->company_id)->count();
    }

    public function totalRiskOkrs()
    {

        return ObjectiveMetric::where('progress','!=<','target')->count();
    }


    public function totalNotAtRiskOkrs()
    {

        return ObjectiveMetric::where('progress','!=','target')->count();
    }

  public function createOjective($request)
  {
    $request->validate([
      'title' => 'required|string',
      'tag' => 'nullable|string',
      'description' => 'nullable|string',
      'type' => 'required|string',
      'team' => 'exclude_unless:type,team|required',
      'period.when' => 'required|string',
      'period.startDate' => 'required|string',
      'period.endDate' => 'required|string',
      'progress.type' => 'required|string',
      'progress.option' => 'required|string',
      'unit' => 'required|string',
    ], [], [
      'period.when' => 'when',
      'period.startDate' => 'start date',
      'period.endDate' => 'end date',
      'progress.type' => 'type',
      'progress.option' => 'option',
    ]);

    try {
      return DB::transaction(function () use ($request) {
        $objective = Objective::create([
          'user_id' => Auth::id(),
          'company_id' => Auth::user()->company_id,
          'title' => $request->title,
          'tags' => $request->tag,
          'description' => $request->description,
          'type' => $request->type,
          'period' => json_encode((object)$request->period),
          'progress' => json_encode((object)$request->progress),
        ]);
        ObjectiveMetric::create([
          'objective_id' => $objective->id,
          'unit' => $request->unit,
        ]);
        if ($request->team) {
          $objective->teamObjectives()->createMany(array_map(
            function ($team) {
              return [
                'team_id' => $team,
              ];
            },
            $request->team
          ));
        }
        return response()->json(['created' => true, 'objective' => $this->getUserObjectives($objective->id)]);
      });
    } catch (\Exception $e) {
      return response()->json([
        'insertionFailed' => 'Objective could not be created, please refresh and try again.'
      ], 422);
    }
  }
  public function updateObjective($request, $objective)
  {
    $request->validate([
      'title' => 'required|string',
      'tag' => 'nullable|string',
      'description' => 'nullable|string',
      'type' => 'required|string',
      'team' => 'exclude_unless:type,team|required',
      'period.when' => 'required|string',
      'period.startDate' => 'required|string',
      'period.endDate' => 'required|string',
      'progress.type' => 'required|string',
      'progress.option' => 'required|string',
      'unit' => 'required|string',
    ], [], [
      'period.when' => 'when',
      'period.startDate' => 'start date',
      'period.endDate' => 'end date',
      'progress.type' => 'type',
      'progress.option' => 'option',
    ]);
    DB::table('objectives')->where('id', $objective)->update([
      'title' => $request->title,
      'tags' => $request->tag,
      'description' => $request->description,
      'type' => $request->type,
      'period' => json_encode((object)$request->period),
      'progress' => json_encode((object)$request->progress),
    ]);
    DB::table('objective_metrics')->where('objective_id', $objective)->update([
      'unit' => $request->unit,
    ]);
    return response()->json(['updated' => true, 'objective' => $this->getUserObjectives($objective)]);
  }
  public function destroyObjective($objective)
  {
    $objective->delete();
    return response()->json(['deleted' => true]);
  }

  public function createKeyResult($request)
  {
    $request->validate([
      'metric' => 'required|string',
      'target' => 'required|numeric',
      'starting' => 'required|numeric',
      'title' => 'required|string',
      'tag' => 'nullable|string',
      'description' => 'nullable|string',
      'type' => 'required|string',
      'period.when' => 'required|string',
      'period.startDate' => 'required|string',
      'period.endDate' => 'required|string',
      'progress.type' => 'required|string',
      'progress.option' => 'required|string',
    ], [], [
      'period.when' => 'when',
      'period.startDate' => 'start date',
      'period.endDate' => 'end date',
      'progress.type' => 'type',
      'progress.option' => 'option',
    ]);
    $keyResult = KeyResult::create([
      'objective_id' => $request->objectiveId,
      'user_id' => Auth::id(),
      'metric' => $request->metric,
      'title' => $request->title,
      'tags' => $request->tag,
      'description' => $request->description,
      'type' => $request->type,
      'period' => json_encode((object)$request->period),
      'progress' => json_encode((object)$request->progress),
    ]);

    KeyResultMetric::create([
      'key_result_id' => $keyResult->id,
      'target' => $request->target,
      'start' => $request->starting,
    ]);

    DB::table('objective_metrics')->where('objective_id', $keyResult->objective_id)->increment('target', $request->target);

    return response()->json(['created' => true, 'keyResult' => $this->getKeyResult($keyResult->id)]);
  }
  public function updateKeyResult($request, $keyResult)
  {
    $request->validate([
      'metric' => 'required|string',
      'target' => 'required|numeric',
      'starting' => 'required|numeric',
      'title' => 'required|string',
      'tag' => 'nullable|string',
      'description' => 'nullable|string',
      'type' => 'required|string',
      'period.when' => 'required|string',
      'period.startDate' => 'required|string',
      'period.endDate' => 'required|string',
      'progress.type' => 'required|string',
      'progress.option' => 'required|string',
    ], [], [
      'period.when' => 'when',
      'period.startDate' => 'start date',
      'period.endDate' => 'end date',
      'progress.type' => 'type',
      'progress.option' => 'option',
    ]);
    DB::table('key_results')->where('id', $keyResult)->update([
      'metric' => $request->metric,
      'title' => $request->title,
      'tags' => $request->tag,
      'description' => $request->description,
      'type' => $request->type,
      'period' => json_encode((object)$request->period),
      'progress' => json_encode((object)$request->progress),
    ]);
    DB::table('key_result_metrics')->where('key_result_id', $keyResult)->update([
      'target' => $request->target,
      'start' => $request->starting,
    ]);
    if ($request->target < $request->prevTarget) {
      $target = $request->prevTarget - $request->target;
      DB::table('objective_metrics')->where('objective_id', $request->objectiveId)->decrement('target', $target);
    }
    if ($request->target > $request->prevTarget) {
      $target = $request->target - $request->prevTarget;
      DB::table('objective_metrics')->where('objective_id', $request->objectiveId)->increment('target', $target);
    }

    return response()->json(['updated' => true, 'keyResult' => $this->getKeyResult($keyResult)]);
  }
  public function destroyKeyResult($keyResult)
  {
    $objectiveId = $keyResult->objective_id;
    $keyResult->delete();
    $total = DB::table('key_result_metrics')->select(DB::raw('SUM(progress) as total_progress, SUM(target) as total_target'))->first();
    if ($total->total_progress && $total->total_target) {
      DB::table('objective_metrics')
        ->where('objective_id', $objectiveId)
        ->update([
          'target' => $total->total_target,
          'progress' => (int)(($total->total_progress / $total->total_target) * 100)
        ]);
    } else {
      DB::table('objective_metrics')
        ->where('objective_id', $objectiveId)
        ->update([
          'target' => 0,
          'progress' => 0
        ]);
    }
    return response()->json(['deleted' => true]);
  }
  public function updateCheckIn($request, $objectiveMetric, $keyResultMetric)
  {
    DB::table('objective_metrics')->where('objective_id', $objectiveMetric)->update(['progress' => $request->objProgress]);
    $keyResultMetric->progress = $request->krProgress;
    $keyResultMetric->status = $request->status;
    $keyResultMetric->save();

    return response()->json(['updated' => true, 'keyResult' => $this->getKeyResult($keyResultMetric->key_result_id)]);
  }
}
