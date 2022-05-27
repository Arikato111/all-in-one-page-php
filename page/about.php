<?php
function AboutPage()
{
    // $head just keep Menu of page
    $head = <<<HTML
            <div><a href="/about?mode=params">params</a> | <a href="/about?mode=new">new</a> | <a href="about">default</a><hr></div>
        HTML;

    if (isset($_GET['mode'])) { // check mode value
        if ($_GET['mode'] == 'new') {
            $mode = NewMode(); // use $mode to keep page of mode
        } else if ($_GET['mode'] == 'params') {
            $mode = paramsMode();
        }
    } else {
        $mode = DefaultMode();
    }
    return  $head . $mode;
}

function NewMode()
{
    return title('About | New') . // use title() to change title
    <<<HTML
    <div><h1>This is New Feed</h1></div>
    HTML;
}

function paramsMode()
{
    if (isset($_GET['p'])) {
        header("Location: /about/" . $_GET['p']); // redirect
        exit;
    }
    return title("About | Form") .
        <<<HTML
        <form action="/about">
                <label for="params">input params </label>
                <input type="hidden" name="mode" value="params">
                <input type="text" name="p">
                <button>submit</button>
            </form>
        HTML;
}

function DefaultMode()
{
    return title("About | Default")  // use titile()
        .  <<<HTML
            This is About page <div>click <a href="/about?mode=params"> params </a> or <a href="/about?mode=new"> new </a> to switch mode</div><h3> click home to go to home page</h3>
        HTML;
}
