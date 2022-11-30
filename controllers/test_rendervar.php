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

// test iterable 

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

var_dump(is_iterable($input));
var_dump(is_array($input));

foreach ($rinput as $name => $value) {
    print("$name santized: ".$value."<br />");
    print("$name unsafe: ".$value->unsafe."<br />");
}

$arr = ['<b>something</b>', 'something else', '<i>oh yeah</i>'];
$rarr = new Fzb\RenderVar($arr);
print($arr[0].$arr[1].$arr[2]."<br />");
print($rarr[0].$rarr[1].$rarr[2]."<br />");

$bm->end();
Fzb\Benchmark::show();