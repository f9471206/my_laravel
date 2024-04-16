<?php

namespace App\Http\Controllers;

use App\Models\home\Article;
use App\Models\home\Member;
use Illuminate\Http\Request;
//快取
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TestController extends Controller {
    public function show(Request $request) {
        // $input = $request->only('age', 'name');

        //除了什麼之外 其他都要獲取
        // $input = $request->except('name');

        //確認是否存在並回傳布爾值
        $input = $request->has('name');

        dd($input);
    }

    public function add() {
        $db = DB::table('member');
        #region
        // $result = $db->insert([
        //     [
        //         'name'  => '冬天',
        //         'age'   => '18',
        //         'email' => 'w@gmail.com',
        //     ],
        //     [
        //         'name'  => '春天',
        //         'age'   => '19',
        //         'email' => 'ttt@gmail.com',
        //     ],
        // ]);
        #endregion

        #region
        // $result = $db->insertGetId([
        //     'name'  => '夏天',
        //     'age'   => '16',
        //     'email' => 'hot@gmail.com',
        // ]);
        #endregion
        // dd($result);
    }

    public function update() {
        //定義需要操作的資料表
        $db = DB::table('member');
        $result = $db->where('id', '=', '1')->update([
            'name' => '駱駝',
        ]);
        dd($result);
    }

    public function select() {
        // 1.get()
        // 2.first
        // 3.value
        //查詢全部
        // $db = DB::table('member');
        // $result = $db->get();
        // foreach ($result as $key => $value) {
        //     echo "id是 {$value->id} 名稱是 {$value->name} 信箱是 {$value->email} <br/>";
        // }

        //查詢指定資料
        // $db = DB::table('member');
        // $result = $db->where("id", "=", "2")->get();
        // dd($result);

        // $db = DB::table('member');
        // $result = $db->where('id', '<', '2')->orWhere('age', '<', '18')->get();
        // dd($result);

        //取出單行數據  就像 limit 1
        // $db = DB::table('member');
        // $result = $db->first();
        // dd($result);

        //獲取某個具體的值 ( 一個字段 )
        // $db = DB::table('member');
        // $result = $db->where('id', '1')->value('email');
        // dd($result);

        //獲取某些字段數據 ( 多個字段 )
        // $db = DB::table('member');
        // $result = $db->where('id', '1')->select('email as userEmail', 'age')->get();
        // dd($result);

        //排序操作 orderBy('','') asc 升序  desc 降序
        // $db = DB::table('member');
        // $result = $db->orderBy('age', 'desc')->get();
        // dd($result);

        //分頁操作 limit 限制輸出幾個 offset 從第幾個開始
        $db = DB::table('member');
        $result = $db->limit(2)->offset(1)->get();
        dd($result);
    }

    public function del() {
        $db = DB::table('member');
        $result = $db->where('id', '1')->delete();
        dd($result);
        //返回值表示受到影響的行數
    }

    public function test4() {
        $data = DB::table('member')->get();
        $day = date('N');
        return view('home.test.test4', compact('data', 'day'));
    }

    //模板展示
    public function test5() {
        return view('home.test.test5');
    }

    //crf 驗證
    public function test6() {
        return view('home.test.test6');

    }
    public function test7() {
        return '成功';
    }

    //模型的增刪改柴
    public function test8(Request $request) {
        $model = new Member();
        // $model->name = '劉ㄚㄚ';
        // $model->age = '28';
        // $model->email = 'test@gmail.com';
        // $result = $model->save();
        $result = $model->create($request->all());
        dd($result);
    }

    public function test9() {
        return view('home.test.test8');
    }

    //查詢操作
    public function test10() {
        // $data = Member::find(7)->toArray();
        //查詢指定條件的第一條數據
        $data = Member::where("id", ">", "4")->first()->toArray();
        dd($data);
    }

    //修改操作
    public function test11() {
        //ar 模式的修改
        // $data = Member::find(7);
        // $data->email = "admin@admin.com";
        // $result = $data->save();
        // dd($result);

        //使用 update()
        $result = Member::where('id', '7')->update(['age' => '33']);
        dd($result);
    }

    //刪除操作
    public function test12() {
        $data = Member::find(7);
        dd($data->delete());

    }

    //自動驗證
    public function test13(Request $request) {
        //判斷請求類型
        if ($request->isMethod("post")) {
            //自動驗證
            $request->validate([
                'name'  => 'required|min:2|max:20',
                'age'   => 'required|min:1|max:100|integer',
                'email' => 'required|email',
            ]);
        } else {

            return view('home.test.test9');
        }
    }

    //上傳文件
    public function test14(Request $request) {
        if ($request->isMethod('post')) {
            //上傳
            // $request->hasFile('avatar') 文件是否存在
            // $request->file('avatar')->isValid() 文件是否上傳成功
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                //獲取文件原始名稱 getClientOriginalName() <= 被視為不安全 改成 hashName()
                // $request->file('avatar')->getSize();
                $path = md5(time() . rand(100000, 999999)) . '.' . $request->file('avatar')->extension();
                $request->file('avatar')->move('./uploads', $path);

                $data = $request->all();
                $data['avatar'] = './uploads' . $path;
                $result = Member::create($data);
                // dd($result);
                if ($result) {
                    return redirect('/');
                }

            }

        } else {
            //顯示
            return view('home.test.test10');
        }
    }

    //分頁查詢
    public function test15() {
        //查詢數據
        $data = Member::paginate(1);
        return view('/home.test.test11', compact('data'));
    }

    //ajax 響應
    public function test16() {
        return view('/home.test.test12');
    }

    public function test17() {
        $data = Member::get();
        // return json_decode($data);
        return response()->json($data);
    }

    //會話控制
    public function test18(Request $request) {
        //Session中存取一個變量
        $request->session()->put('name', '楊桃');
        $request->session()->put('age', '77');
        // dd($request->session()->get('age', function () {return '蝦';}));
        // dd($request->session()->has('aa'));
        //刪除
        // $request->session()->forget('age');
        // $request->session()->flush();
        dd($request->session()->all());

    }

    //快取
    public function test19() {
        // Cache::put('class', 'qz04', 10);
        // Cache::put('class', '覆蓋', 10);
        // echo Cache::get('class');
        // $time = Cache::remember('time', 10, function () {
        //     return date('Y-m-d H:i:s', time());
        // });
        // dd($time);
        // $date = Cache::rememberForever('date', function () {
        //     return date('Y-m-d', time());
        // });
        // dd($date);
        Cache::flush();
    }

    //連表查詢
    public function test20() {

        //SELECT t1.id,t1.article_name,t2.author_name FROM article AS t1 LEFT JOIN author AS t2 ON t1.author_id=t2.id
        $data = DB::table('article as t1')->select('t1.id', 't1.article_name', 't2.author_name')->leftJoin('author as t2', 't1.author_id', '=', 't2.id')->get();
        dd($data);
    }

    //模型關聯
    public function test21() {
        $data = Article::all();
        foreach ($data as $key => $value) {
            echo ($value->id . '--' . $value->article_name . '--' . $value->author->author_name . '<br>');
        }
    }

    //一對多
    public function test22() {
        $data = Article::get();
        foreach ($data as $key => $value) {
            echo $value->article_name;
            foreach ($value->comment as $k => $val) {
                echo '--' . $val->comment . '</br>';
            }
        }
    }

}
