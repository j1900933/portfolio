<!DOCCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>一覧画面</title>
        <link rel="stylesheet" href="/engineers.css">
        <script src="{{ mix('js/ajax.js') }}" defer></script>
        <script src="{{ mix('js/filterble.js') }}" defer></script>
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
        <table>
            <thead>
                <tr>
                    <th>@sortablelink('id' , 'ID')</th>
                    <th>就職状況<br>
                    <form action="{{ route('engineers.index') }}">
                        <select class="filterble">
                            <option value="">全て</option>
                            @foreach($employmentStatuses as $employmentStatus)
                                <option value={{$employmentStatus->name_num}}>{{$employmentStatus->name}}</option>
                            @endforeach
                        </select>
                    </form>
                    </th>
                    <th>@sortablelink('last_name' , '名前')</th>
                    <th>@sortablelink('birth_date' , '年齢')</th>
                    <th>採用状況<br>
                    <select>
                        <option value="">全て</option>
                        @foreach($inHouseStatuses as $inHouseStatus)
                            <option value={{$inHouseStatus->name_num}}>{{$inHouseStatus->name}}</option>
                        @endforeach
                    </select>
                    </th>
                    <th>性別</th>
                    <th>@sortablelink('address' , '地域')</th>
                    <th>エンジニアスキル<br>
                    <select>
                        <option value="">全て</option>
                        @foreach($engineerSkills as $engineerSkill)
                            <option value={{$engineerSkill->name_num}}>{{$engineerSkill->lebel}}</option>
                        @endforeach
                    </th>
                    <th>ヒューマンスキル<br>
                    <select>
                        <option value="">全て</option>
                        @foreach($humanSkills as $humanSkill)
                            <option value={{$humanSkill->name_num}}>{{$humanSkill->lebel}}</option>
                        @endforeach
                    </select>
                    </th>
                    <th>履歴書</th>
                    <th>職務経歴書</th>
                    <th>メモ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($engineers as $engineer)
                    <tr class="list">
                        <td><a href="{{ route('engineers.show', $engineer)}}">{{$engineer->id}}</a></td>
                            <input type="hidden" class="id" value="{{$engineer->id}}">
                        <td>
                            <select class="employment">
                                @foreach($employmentStatuses as $employmentStatus)
                                    <option class="employment" value={{$employmentStatus->name_num}} @if($engineer->employment_status == $employmentStatus) selected @endif>{{$employmentStatus->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{$engineer->full_name}}</td>
                        <td>{{$engineer->age}}歳</td> 
                        <td>
                            <select class="inHouseStatus">
                                @foreach($inHouseStatuses as $inHouseStatus)
                                    <option class="inHouseStatus" value={{$inHouseStatus->name_num}} @if($engineer->in_house_status == $inHouseStatus) selected @endif>{{$inHouseStatus->name}}</option>
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
                            <select class="engineerSkill">
                                @foreach($engineerSkills as $engineerSkill)
                                    <option class="engineerSkill" value={{$engineerSkill->name_num}} @if($engineer->engineer_skill == $engineerSkill) selected @endif>{{$engineerSkill->lebel}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="humanSkill">
                                @foreach($humanSkills as $humanSkill)
                                    <option class="humanSkill" value={{$humanSkill->name_num}} @if($engineer->human_skill == $humanSkill) selected @endif>{{$humanSkill->lebel}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            @if($engineer->resume == "")
                                <button onclick="alert('履歴書が登録されていません')">DL</button>
                            @else
                                <button onclick="location.href='{{ $engineer->resume }}'">DL</button>
                            @endif
                        </td>
                        <td>
                            @if($engineer->job_history_sheet == "")
                                <button onclick="alert('職務履歴書が登録されていません')">DL</button>
                            @else
                                <button onclick="location.href='{{ $engineer->job_history_sheet }}'">DL</button>
                            @endif
                        </td>
                        <td style="position:relative" class="comments">
                            <input type="text" class="comment" value="{{$engineer->comment}}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $engineers->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </body>
</html>