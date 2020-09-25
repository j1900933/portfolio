<!DOCCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>詳細画面</title>
        <link rel="stylesheet" href="/css/engineers.css">
        <link rel="stylesheet" href="/css/show.css">
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
        <article>
                <div class="name">
                        <form method="post" action="{{ route('engineers.destroy', $engineer)}}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" value="delete" onclick='return confirm("本当に削除しますか？")';>削除</button>
                        </form>
                        <form action="{{ route('engineers.edit', $engineer)}}">
                            <button type="submit" value="edit">編集</button>
                        </form>                    
                    <p>{{$engineer->full_name}}</p>
                </div>
                <div class="main">
                    <ul>
                        <li><!--性別 -->
                            @if($engineer->gender === '鬼')
                                {{$engineer->gender}}
                            @else
                                {{$engineer->gender}}性
                            @endif
                        </li>　
                        <li>{{$engineer->birth_date->format('Y年m月d日')}} {{$engineer->age}}歳</li>　<!--生年月日　年齢-->
                        <li>{{$engineer->educational_background}}</li>　<!--最終学歴 -->
                    </ul>
                    <h2>連絡先</h2>
                    <ul>
                        <li>〒{{$engineer->postal_code}} {{$engineer->address}}</li>　<!--郵便番号　住所番地 -->
                        <li>{{$engineer->email}}</li>　<!--メール -->
                        <li>{{$engineer->tel}}</li>　<!--電話番号 -->
                    </ul>
                    <h2>メモ</h2>
                    <ul>
                        <li>{{$engineer->comment}}</li>
                    </ul>
                </div>
            </article>
            <section>
                <div class="file">
                    <div class="resume">
                        <h2>履歴書</h2>
                        @if($engineer->resume != null)
                            <object data="{{ asset ($engineer->resume) }}" type="application/pdf" width="400px" height="350px"></object>
                        @else
                            <p>No image</p>
                        @endif
                    </div>
                    <div class="resume">
                        <h2>職務経歴書</h2>
                        @if($engineer->job_history_sheet != null)
                            <object data="{{ asset ($engineer->job_history_sheet) }}" type="application/pdf" width="400px" height="350px"></object>
                        @else
                            <p>No image</p>
                        @endif
                    </div>
                </div>
            </section>
    </body>
</html>
