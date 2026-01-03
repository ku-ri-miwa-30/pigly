<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Log;
// use App\Models\User;
// use App\Models\Target;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //ログ全体画面表示
    public function weight_logs(Request $req)
    {
        $user = auth()->user();

        $query = Log::where('user_id', $user->id);

        // 開始日がある場合
        if ($req->filled('start_date')) {
            $query->where('date', '>=', $req->start_date);
        }

        // 終了日がある場合
        if ($req->filled('end_date')) {
            $query->where('date', '<=', $req->end_date);
        }

        $logs = $query->orderBy('date', 'desc')->get();

        // 現在体重
        if ($user->log->isNotEmpty()) {
            // ログがある場合 → 最新ログの体重
            $currentWeight = $user->log->first()->weight;
        } else {
            // ログが無い場合 → 会員登録時の体重
            $currentWeight = $user->target->target_weight;
        }

        // 目標体重
        $targetWeight = optional($user->target)->target_weight;

        // 目標まで
        $diffWeight = null;
        if ($targetWeight !== null) {
            $diffWeight = $currentWeight - $targetWeight;
        }

        return view('weight_logs', compact(
            'logs',
            'currentWeight',
            'targetWeight',
            'diffWeight',
        ));
    }


    //目標設定保存処理
    public function target_store(Request $req)
    {
        //目標体重
        auth()->user()->target()->create(
            [
                'target_weight' => $req->target_weight,
            ]
        );

        return redirect('/weight_logs');
    }

    // public function weight_logs(Request $req)
    // {
    //     $user = auth()->user();

    //     // 現在体重
    //     if ($user->log->isNotEmpty()) {
    //         // ログがある場合 → 最新ログの体重
    //         $currentWeight = $user->log->first()->weight;
    //     } else {
    //         // ログが無い場合 → 会員登録時の体重
    //         $currentWeight = $user->target->target_weight;
    //     }

    //     // 目標体重
    //     $targetWeight = optional($user->target)->target_weight;

    //     // 目標まで
    //     $diffWeight = null;
    //     if ($targetWeight !== null) {
    //         $diffWeight = $currentWeight - $targetWeight;
    //     }
    //     $logs = auth()->user()->log();
    //     return view('weight_logs', compact(
    //         'logs',
    //         'currentWeight',
    //         'targetWeight',
    //         'diffWeight',
    //     ));
    // }

    //データ追加画面
    public function create(Request $req)
    {
        return view('create_log');
    }

    //ログ追加処理
    public function log_store(LogRequest $req)
    {
        auth()->user()->log()->create(
            [
                'date' => $req->date,
                'weight' => $req->weight,
                'calories' => $req->calories,
                'execise_time' => $req->execise_time,
                'execise_content' => $req->execise_content,
            ]
        );

        //weight_logsにリダイレクト
        return redirect('/weight_logs');
    }

    //ログ詳細画面表示
    public function detail(Request $req)
    {
        $log = Log::find($req->log_id);
        return view('detail', compact('log'));
    }

    //検索処理
    public function search(Request $req)
    {
        $max = $req->max;
        $min = $req->min;

        $query = Log::query();

        if ($max) {
            $query->where('date', 'LIKE', '%' . $max . '%');
        }
        if ($min) {
            $query->where('date', 'LIKE', '%' . $min . '%');
        }


        $date = $query->get();
        return view('weight_logs', compact('date'));
    }

    //更新処理
    public function update(Request $req)
    {
        //受け取った値を格納する。
        $data = $req->all();
        unset($data['_token']);
        //引数でうけとったidのテーブルデータに対して更新を行う。
        Log::find($req->log_id)->update($data);
        return redirect('/weight_logs');
    }
    //削除処理
    //特定の値を削除するには？
    public function delete(Request $req)
    {
        //受け取ったIDのテーブルデータを削除
        Log::find($req->log_id)->delete();
        return redirect('/weight_logs');
    }
}
