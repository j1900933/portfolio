<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規登録画面</title>
        <link rel="stylesheet" href="/css/engineers.css">
        <link rel="stylesheet" href="/css/create.css">
        <script src="{{ mix('js/preview.js') }}" defer></script>
        <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    </head>
    <body>
        <header class="page-header">
            <h1>Engineer-Management</h1>
            <ul class="nav"> 
                <li><a href="/">Top</a></li>
                <li><a href="{{ route('engineers.index')}}">一覧</a></li>
                <li><a href="{{ route('engineers.create')}}">新規登録</a></li>
            </ul>
        </header>
        <form class="h-adr" action="{{ route('engineers.update', $engineer) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
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
            <div class="form">
                <label>苗字 <span>必須</span></label><br>
                <input name="last_name" value="{{$engineer['last_name']}}" placeholder="苗字"><br>
                <label>名前 <span>必須</span></label><br>
                <input name="first_name" value="{{$engineer['first_name']}}" required placeholder="名前"><br>
                <label>フリガナ苗字 <span>必須</span></label><br>
                <input name="last_name_furigana" value="{{$engineer['last_name_furigana']}}" required patern="^[ァ-ンヴー]+$ , [\u30A1-\u30FF]*" placeholder="全角カタカナ"><br>
                <label>フリガナ名前 <span>必須</span></label><br>
                <input name="first_name_furigana" value="{{$engineer['first_name_furigana']}}" required patern="^[ァ-ンヴー]+$ , [\u30A1-\u30FF]*" placeholder="全角カタカナ"><br>
                <label>性別</label><br>
                <select name="gender">
                    <option value="" disabled　selected>選択してください</option>
                    <option value="男" @if($engineer['gender']=="男") selected @endif>男</option>
                    <option value="女" @if($engineer['gender']=="女") selected @endif>女</option>
                    <option value="鬼" @if($engineer['gender']=="鬼") selected @endif>鬼</option>
                </select><br>
                <label>生年月日 <span>必須</span></label><br>
                <input name="birth_date" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$"  value="{{$engineer['birth_date']}}" required placeholder="YYYY-mm-dd"><br>
                <label>メールアドレス <span>必須</span></label><br>
                <input type="email" name="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="{{$engineer['email']}}" required placeholder="メールアドレス"><br>
                <label>電話番号</label><br>
                <input type="tel" name="tel" pattern="^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$" value="{{$engineer['tel']}}" required placeholder="000-0000-0000"><br>
                <span class="p-country-name" style="display:none;">Japan</span>
                <label>郵便番号 <span>必須</span></label><br>
                〒<input class="p-postal-code"　name="postal_code" pattern="^[0-9]{3}-[0-9]{4}$" value="{{$engineer['postal_code']}}" required placeholder="000-0000"><br>
                <label>住所 <span>必須</span></label><br>
                <input class="p-region p-locality p-street-address p-extended-address"　name="address" value="{{$engineer['address']}}" required placeholder="都道府県　市町村　番地"><br>
                <label>最寄り駅 <span>必須</span></label><br>
                <input name="closest_station" value="{{$engineer['closest_station']}}" required placeholder="最寄り駅"><br>
                <label>最終学歴 <span>必須</span></label><br>
                <input name="educational_background" value="{{$engineer['educational_background']}}" required placeholder="最終学歴"><br>
            </div>
            <div class="file">
                <label class="resume_file">
                    履歴書<br>
                    <input type="file" name="resume" value="{{$engineer['resume']}}">
                    <div class="preview-1"><p class="preview"></p></div>
                </label>
                <label class="job_history_sheet_file">
                    職務履歴書<br>
                    <input type="file" name="job_history_sheet" value="{{$engineer['job_history_sheet']}}">
                    <div class="preview-2"><p class="preview"></p></div>
                </label><br>
            </div>
            <div class="btn">
                <button>更新</button>
            </div>
        </form>
    </body>
</html>
