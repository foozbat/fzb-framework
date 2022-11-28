<?php
namespace TestApp;

use Fzb;

$db  = new Fzb\Database(ini_file: CONFIG_DIR."/.config.ini");

$obj = new MyClass(
    name: "Bill",
    city: "Nowhere <b>Ville</b>",
    state: "TX",
    zip: rand(10000, 99999)
);

$obj2 = MyClass::get_all();

$bm = new Fzb\Benchmark("render_vars");
$bm->start();

$blah = new Fzb\RenderVar('blah <b>blah</b>');
print($blah."<br />");
print($blah->unsafe."<br />");

$robj = new Fzb\RenderVar($obj2);

foreach ($robj as $r) {
    print($r->name."<br/>");
    print($r->name->unsafe."<br/>");
    print($r->city."<br/>");
    print($r->city->unsafe."<br/>");
}

$input = new Fzb\Input(
    one:   [ 'type' => 'GET', 'required' => true ],
    two:   [ 'type' => 'GET', 'required' => true ],
    three: [ 'type' => 'GET', 'required' => true ],
);

$rinput = new Fzb\RenderVar($input);

print("input['one']: ".$input['one']."<br />");
print("one santized: ".$rinput['one']."<br />");
print("one unsafe: ".$rinput['one']->unsafe."<br />");

var_dump($rinput);

$bm->end();
Fzb\Benchmark::show();