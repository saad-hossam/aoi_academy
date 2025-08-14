<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use MetaTag;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        MetaTag::set('title', '');
        MetaTag::set('description', 'مرحبًا بك في اتيكو، وجهتك الرئيسية للأثاث العصري والأنيق. نحن نقدم تشكيلة واسعة من الأثاث عالي الجودة والمصمم بعناية لتلبية احتياجات منزلك ومكتبك. اكتشف مجموعتنا المذهلة من الأثاث بتصاميم مبتكرة تجمع بين الأناقة والوظائف العملية.');
        MetaTag::set('image', asset('assets/front/img/logo/Logo_Arab.png'));

    }
}
