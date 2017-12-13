# Under Strap

WordPressの標準的なテーマを作ったばい！  
「Under Strap」とは、**Underscores**と**Bootstrap**を合わせたやつ。  

### Underscores
<http://underscores.me/>

WordPressの標準的なテーマ。  
「**Theme Name**」にテーマ名を入れて、「**GENERATE**」ボタンを押すだけ。  
簡単にテーマの基礎ができあがり！  

### Bootstrap
<http://getbootstrap.com/>

皆さんご存知、レスポンシブデザインに対応したCSSフレームワーク。  
PCとスマホの両方のデザインを作るのは面倒くさかけん、これが一番やね。  
バージョンは3.3.7を使用。  

## Underscoresから修正した内容

まず、CSSとJSを読み込ませるために「**functions.php**」を変更したと。  
直接ファイルは入れずに、**CDN**を使っとるけん。  
あ、ついでに**Font Awesome**も入れてます。  

### functions.php
    function under_strap_scripts() {
        ・・・
        wp_enqueue_style( 'under-strap-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
        wp_enqueue_style( 'under-strap-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
        ・・・
        wp_enqueue_script( 'under-strap-bootstrap', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '20151215', true );
        wp_enqueue_script( 'under-strap-bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js', array(), '20151215', true );
    ・・・
    }

後は、Bootstrapの書き方の通り「**header.php**」ナビを追加したり、検索フォームのレイアウトを変えるために「**searchform.php**」を追加しとーけんね。（詳細はソースを見てね！）  
んでね、当然これだけじゃグリッドレイアウトにならんけん、サイドバー（ウィジェット）やメインコンテンツのレイアウトが崩れるったい。 
あんま好きじゃなかけど、できるだけUnderscoresのベースを変えたくなかけん、「**footer.php**」で後からjQueryでclassば差し込んどーと。  
サイドバー（sidebar.php）は「col-md-4」、メインコンテンツ（index.php他）は「col-md-8」を入れとるよ。  
比率は好きなように変えてんしゃい！  
他のやり方があったら教えてね。  

### footer.php
    <script type="text/javascript">
        $(document).ready(function() {
    	// Content
        $('.content-area').addClass('col-md-8');
    	// Widget
        $('.widget-area').addClass('col-md-4');
        $('.widget > ul').addClass('list-group');
        $('.widget > ul > li').addClass('list-group-item');
        // Calendar
        $('#calendar_wrap').addClass('panel-body');
        $('#wp-calendar').addClass('table');
        // Text
        $('.textwidget').addClass('panel-body');
        // Form
        $('select,textarea,input:not([type=button],[type=submit])').addClass('form-control');
        $('[type=button],[type=submit]').addClass('btn btn-default');
        // Add to ...
    });
    </script>

## テーマオプションの追加

これだけじゃ面白くなかろ？  
そこで、このテンプレートの目玉！  
16パターンのデザインに変更できる「テーマオプション」機能を追加しました！  

何ぞや？言うと、Bootstrapのデザインを簡単に変更する**Bootswatch**ちゅ～のがあるったい。  
なんと！BootstrapのCSSを読み込んでいるコードのあとに、同じくBootswatchのCSSを読み込ませる行を一行追加するだけでデザインが早変わり！  

### Bootswatch
https://bootswatch.com/

これを管理画面の**「外観」＞「テーマオプション」**として追加したばい！  
設定画面は「**admin-option.php**」ていうファイル追加したと。  
ソースはtableタグでベタ書きしとーけん、あんまツッコまんでね...。  

んで、管理画面の設定と値の保存は「functions.php」に書いとるよ。  

### functions.php
    function under_strap_bootswatch() {
        add_option('color');
        add_action('admin_menu', 'option_menu_create');
        function option_menu_create() {
            add_theme_page(esc_attr__( 'Theme Options' ), esc_attr__( 'Theme Options' ), 'edit_themes', basename(__FILE__), 'option_page_create');
        }
        function option_page_create() {
            $saved = under_strap_save_option();
            require TEMPLATEPATH.'/admin-option.php';
        }
    }
    function under_strap_save_option() {
        if (empty($_REQUEST['color'])) return;
        $save = update_option('color', $_REQUEST['color']);
        return $save;
    }
    add_action('init', 'under_strap_bootswatch');

実際に読み込んでいるところは、さっき書いた**under_strap_scripts()**関数の中に追加したけん。  
これもCDN。バージョンはBootstrapと同じ3.3.7。  

### functions.php
    function under_strap_scripts() {
    	・・・
    	if ( get_option('color') && get_option('color') != 'default' ):
    		wp_enqueue_style( 'under-strap-bootswatch', '//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/' . get_option('color') . '/bootstrap.min.css' );
    	endif;
    	・・・
    }

説明はここまで。  
home.phpとかはあえて作らんかった。  
そんなもん固定ページでなんとかなろーもん？  
まぁ、色々言いたいことあるやろーけど、ベースのテンプレートを作るってことで、これくらいにしとこ。  
