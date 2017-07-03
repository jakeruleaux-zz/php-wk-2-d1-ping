<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Src.php";

    session_start();
    use Symfony\Component\Debug\Debug;
    Debug::enable();

    if(empty($_SESSION['ping_pong'])) {
    $_SESSION['ping_pong'] = array();
}

    $app = new Silex\Application();
$app['debug'] = true;
    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('form.html.twig');
    });

    $app->post("/output", function() use ($app) {
        $pingpossum = new PingPonginator($_POST['pong']);
        $pingpossum->makePongHappen();
        $pingpossum->save();
        // var_dump($pingpossum);
        return $app['twig']->render('ping.html.twig', array("pings" => $pingpossum));
    });

    $app->get("/output", function() use ($app) {
        // var_dump($pingpossum);
        return $app['twig']->render('ping.html.twig', array("pings" => PingPonginator::getAll()));
    });

return $app;

?>
