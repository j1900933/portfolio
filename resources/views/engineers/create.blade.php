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
                <li>Top</li>
                <li><a href="{{ route('engineers.index')}}">一覧</a></li>
                <li>新規登録</li>
            </ul>
        </header>
        <form class="h-adr" action="{{ route('engineers.confirm') }}" method="post" enctype="multipart/form-data">
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
                <input name="last_name" value="{{ old('last_name') }}" required placeholder="苗字"><br>
                <label>名前 <span>必須</span></label><br>
                <input name="first_name" value="{{ old('first_name') }}" required placeholder="名前"><br>
                <label>フリガナ苗字 <span>必須</span></label><br>
                <input name="last_name_furigana" value="{{ old('last_name_furigana') }}" required patern="^[ァ-ンヴー]+$ , [\u30A1-\u30FF]*" placeholder="全角カタカナ"><br>
                <label>フリガナ名前 <span>必須</span></label><br>
                <input name="first_name_furigana" value="{{ old('first_name_furigana') }}" required patern="^[ァ-ンヴー]+$ , [\u30A1-\u30FF]*" placeholder="全角カタカナ"><br>
                <label>性別</label><br>
                <select name="gender">
                    <option value=""disabled style="display:none;" selected>選択してください</option>
                    <option value="男" @if(old("gender")=="男") selected @endif>男</option>
                    <option value="女" @if(old("gender")=="女") selected @endif>女</option>
                    <option value="鬼" @if(old("gender")=="鬼") selected @endif>鬼</option>
                </select><br>
                <label>生年月日 <span>必須</span></label><br>
                <input name="birth_date" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$"  value="{{ old('birth_date') }}" required placeholder="YYYY-mm-dd"><br>
                <label>メールアドレス <span>必須</span></label><br>
                <input type="email" name="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="{{ old('email') }}" required placeholder="メールアドレス"><br>
                <label>電話番号</label><br>
                <input type="tel" name="tel" pattern="^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$" value="{{ old('tel') }}" required placeholder="000-0000-0000"><br>
                <span class="p-country-name" style="display:none;">Japan</span>
                <label>郵便番号 <span>必須</span></label><br>
                〒<input class="p-postal-code" name="postal_code" pattern="^[0-9]{3}-[0-9]{4}$" value="{{ old('postal_code') }}" required placeholder="000-0000"><br>
                <label>都道府県 <span>必須</span></label><br>
                <input class="p-region" name="prefecture" value="{{ old('prefecture') }}" required placeholder="都道府県"><br>
                <label>市</label><br>
                <input class="p-locality" name="city" value="{{ old('city') }}" placeholder="市"><br>
                <label>町名</label><br>
                <input class="p-street-address" name="town" value="{{ old('town') }}" placeholder="町名"><br>
                <label>町名以下 <span>必須</span></label><br>
                <input class="p-extended-address" name="after_address" value="{{ old('after_address') }}" required placeholder="町名以下"><br>
                <label>最寄り駅 <span>必須</span></label><br>
                <input name="closest_station" value="{{ old('closest_station') }}" required placeholder="最寄り駅"><br>
                <label>最終学歴 <span>必須</span></label><br>
                <input name="educational_background" value="{{ old('educational_background') }}" required placeholder="最終学歴"><br>
            </div>
            <div class="file">
                <label class="resume_file">
                    履歴書<br>
                    <input type="file" class="file2" name="resume">
                    <div class="preview-1"></div>
                </label>
                <label class="job_history_sheet_file">
                    職務履歴書<br>
                    <input type="file" class="file2" name="job_history_sheet">
                    <div class="preview-2"></div>
                </label><br>
            </div>
            <div class="btn">
                <button class="next_btn" type="submit">確認画面へ</button>
            </div>
        </form>
    </body>
</html>
