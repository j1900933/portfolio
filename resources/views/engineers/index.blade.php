<!DOCCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>一覧画面</title>
        <link rel="stylesheet" href="/css/engineers.css">
        <script src="{{ mix('js/dataUpdate.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <header class="page-header">
            <h1>Engineer-Management</h1>
            <ul class="nav">
                <li>Top</li>
                <li>一覧</li>
                <li><a href="{{ route('engineers.create')}}">新規登録</a></li>
            </ul>
        </header>
        <ul class="search">
            <li>{{$engineers->firstItem()}}〜{{$engineers->lastItem()}}/{{$engineers->total()}}件</li>
            <form class="rifine_search" action="{{ route('engineers.index') }}">
                <input type="text" class="keyword" name="keyword" placeholder="絞り込み検索">
            </form>
            <li><a href="{{ route('engineers.index')}}">全て表示 : 並び替え解除</a></li>
        </ul>
        <table class="engineers_table"> 
            <thead>
                <tr>
                    <th>@sortablelink('id' , 'ID')</th>
                    <th>就職状況<br>
                    <form class="squeeze"　action="{{ route('engineers.index') }}">
                        <select name="employmentStatus" onchange="submit(this.form);">
                            <option>Squeeze</option>
                            <option value=""><a href="{{ route('engineers.index')}}">全て</a></option>
                            @foreach($employmentStatuses as $employmentStatus)
                                <option value={{$employmentStatus->id}}>{{$employmentStatus->name}}</option>                           
                            @endforeach
                        </select>
                    </form>
                    </th>
                    <th>@sortablelink('last_name' , '名前')</th>
                    <th>@sortablelink('birth_date' , '年齢')</th>
                    <th>採用状況<br>
                    <form class="squeeze" action="{{ route('engineers.index') }}">
                        <select name="inHouseStatus" onchange="submit(this.form);">
                            <option>Squeeze</option>
                            <option value=""><a href="{{ route('engineers.index') }}">全て</a></option>
                            @foreach($inHouseStatuses as $inHouseStatus)
                                <option value={{$inHouseStatus->id}}>{{$inHouseStatus->name}}</option>
                            @endforeach
                        </select>
                    </form>
                    </th>
                    <th>性別</th>
                    <th>@sortablelink('address' , '地域')</th>
                    <th>エンジニアスキル<br>
                    <form class="squeeze" action="{{ route('engineers.index') }}">
                        <select name="engineerSkill" onchange="submit(this.form);">
                            <option>Squeeze</option>
                            <option value=""><a href="{{ route('engineers.index') }}">全て</a></option>
                            @foreach($engineerSkills as $engineerSkill)
                                <option value={{$engineerSkill->id}}>{{$engineerSkill->level}}</option> 
                            @endforeach
                        </select>
                    </form>
                    </th>
                    <th>ヒューマンスキル<br>
                    <form class="squeeze" action="{{ route('engineers.index') }}">
                        <select name="humanSkill" onchange="submit(this.form);">
                            <option>Squeeze</option>
                            <option value=""><a href="{{ route('engineers.index') }}">全て</a></option>
                            @foreach($humanSkills as $humanSkill)
                                <option value={{$humanSkill->id}}>{{$humanSkill->level}}</option>
                            @endforeach
                        </select>
                    </form>
                    </th>
                    <th>履歴書</th>
                    <th>職務経歴書</th>
                    <th>メモ</th>
                </tr>
            </thead>
            <tbody class="engineers">
                @foreach($engineers as $engineer)
                    <tr class="list">
                        <td><a href="{{ route('engineers.show', $engineer)}}">{{$engineer->id}}</a></td>
                        <td>
                            <select class="employment" data-id="{{$engineer->id}}">
                                @foreach($employmentStatuses as $employmentStatus)
                                    <option value={{$employmentStatus->id}} @if($engineer->employment_status == $employmentStatus) selected @endif>{{$employmentStatus->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{$engineer->full_name}}</td>
                        <td>{{$engineer->age}}歳</td> 
                        <td>
                            <select class="inHouseStatus" data-id="{{$engineer->id}}">
                                @foreach($inHouseStatuses as $inHouseStatus)
                                    <option value={{$inHouseStatus->id}} @if($engineer->in_house_status == $inHouseStatus) selected @endif>{{$inHouseStatus->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{$engineer->gender}}</td>
                        @if(strpos($engineer->address, '県') !== false)
                            <td>{{Str::before($engineer->address, "県")}}</td>
                        @elseif(strpos($engineer->address, '東京都') !== false)
                            <td>{{Str::before($engineer->address, "都")}}</td>
                        @elseif(strpos($engineer->address, '府') !== false)
                            <td>{{Str::before($engineer->address, "府")}}</td>
                        @else
                            <td>北海道</td>
                        @endif
                        <td> 
                            <select class="engineerSkill" data-id="{{$engineer->id}}">
                                @foreach($engineerSkills as $engineerSkill)
                                    <option value={{$engineerSkill->id}} @if($engineer->engineer_skill == $engineerSkill) selected @endif>{{$engineerSkill->level}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="humanSkill" data-id="{{$engineer->id}}">
                                @foreach($humanSkills as $humanSkill)
                                    <option value={{$humanSkill->id}} @if($engineer->human_skill == $humanSkill) selected @endif>{{$humanSkill->level}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            @if($engineer->resume == "")
                                <button type="button" class="resume_none" onclick="alert('履歴書が登録されていません')">None</button>
                            @else
                                <button type="button" class="resume_DL" onclick="location.href='{{ $engineer->resume }}'">DL</button>
                            @endif
                        </td>
                        <td>
                        <!-- //type="button"追加 -->
                        <!-- ファイルない時は表示を変える -->
                            @if($engineer->job_history_sheet == "")
                                <button type="button" class="resume_none" onclick="alert('職務履歴書が登録されていません')">None</button>
                            @else
                                <button type="button" class="resume_DL" onclick="location.href='{{ $engineer->job_history_sheet }}'">DL</button>
                            @endif
                        </td>
                        <td style="position:relative">
                            <input type="text" class="comment" data-id="{{$engineer->id}}" value="{{$engineer->comment}}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $engineers->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </body>
</html>