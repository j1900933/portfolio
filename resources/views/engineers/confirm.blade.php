<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規登録画面</title>
        <link rel="stylesheet" href="/engineers.css">
        <link rel="stylesheet" href="/confirm.css">
    </head>
    <body>
        <header class="page-header">
            <h1>Engineer-Management</h1>
            <ul class="nav"> 
                <li>Top</li>
                <li><a href="{{ route('engineers.index')}}">一覧</a></li>
                <li>新規登録</li>
            </ul>
        </header>
        <form action="{{ route('engineers.store') }}" method="post"> 
            @csrf
            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="block">
                <label>名前</label>
                <p>{{$data['last_name']}} {{$data['first_name']}}</p>
                <input type="hidden" name="last_name" value="{{$data['last_name']}}">
                <input type="hidden" name="first_name" value="{{$data['first_name']}}">
            </div>
            <div class="block">
                <label>フリガナ</label>
                <p>{{$data['last_name_furigana']}} {{$data['first_name_furigana']}}</p>
                <input type="hidden" name="last_name_furigana" value="{{$data['last_name_furigana']}}">
                <input type="hidden" name="first_name_furigana" value="{{$data['first_name_furigana']}}">
            </div>
            <div class="block">
                <label>性別</label>
                <p>{{$data['gender']}}</p>
                <input type="hidden" name="gender" value="{{$data['gender']}}">
            </div>
            <div class="block">
                <label>生年月日</label>
                <p>{{$data['birth_date']}}</p>
                <input type="hidden" name="birth_date" value="{{$data['birth_date']}}">
            </div>
            <div class="block">
                <label>メールアドレス</label>
                <p>{{$data['email']}}</p>
                <input type="hidden" name="email" value="{{$data['email']}}">
            </div>
            <div class="block">
                <label>電話番号</label>
                <p>{{$data['tel']}}</p>
                <input type="hidden" name="tel" value="{{$data['tel']}}">
            </div>
            <div class="block">
                <label>郵便番号</label>
                <p>{{$data['postal_code']}}</p>
                <input type="hidden" name="postal_code" value="{{$data['postal_code']}}">
            </div>
            <div class="block">
                <label>住所</label>
                <p>{{$data['prefecture']}}{{$data['city']}}{{$data['town']}}{{$data['after_address']}}</p>
                <input type="hidden" name="prefecture" value="{{$data['prefecture']}}">
                <input type="hidden" name="city" value="{{$data['city']}}">
                <input type="hidden" name="town" value="{{$data['town']}}">
                <input type="hidden" name="after_address" value="{{$data['after_address']}}">
            </div>
            <div class="block">
                <label>最寄り駅</label>
                <p>{{$data['closest_station']}}</p>
                <input type="hidden" name="closest_station" value="{{$data['closest_station']}}">
            </div>
            <div class="block">
                <label>最終学歴</label>
                <p>{{$data['educational_background']}}</p>
                <input type="hidden" name="educational_background" value="{{$data['educational_background']}}">
            </div>
            <div class="action_btn">
                <div class="btn">
                    <button type="submit" name="action" value="back">修正</button>
                </div>
                <div class="btn">
                    <button type="submit" name="action" value="regist">登録</button>
                </div>
            </div>
        </form>
    </body>
</html>