<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Sunra\PhpSimple\HtmlDomParser;

class CrawlerController extends Controller
{

    public function index()
    {

    }        // $file_name = "https://khoinghieptre.vn/";
        // $dom = HtmlDomParser::file_get_html( $file_name );
        // $elems = $dom->find('h3.side-list-title');
        // return view('welcome', compact('elems'));

    public function crawler_Khoinghieptre_kinhdoanh() {

        $k=0;

        for( $i=1; $i<35; $i++ ){
            $file_name = "https://khoinghieptre.vn/kinh-doanh/page/".$i."/";
            $dom = HtmlDomParser::file_get_html( $file_name );
            $posts = $dom->find('li.infinite-post a');

            foreach( $posts as $post )
                {
                    echo $post->href.'<br>';
                    $k++;
                }
        }   

        return $k;     

    }

    public function ex() {
        $url = "https://khoinghieptre.vn/kinh-doanh/page/100/";
        if(get_headers($url)==get_headers('https://khoinghieptre.vn/'))
            return 1;
        return 0;
    }


    public function crawler_cafebiz_kinhdoanh() {
        $kk = 0;
        for($i=3; $i<10; $i++)
        {
            $get_url_cafebiz = "http://cafebiz.vn/ajax/loadListNews-47-".$i.".chn";
            $dom_url = HtmlDomParser::file_get_html($get_url_cafebiz);
            $all_posts = $dom_url->find('li h3 a');

            foreach( $all_posts as $post ) {
                $link = "http://cafebiz.vn".$post->href;
                $dom1 = HtmlDomParser::file_get_html($link);

                $title = $dom1->find('h1.title');
                foreach($title as $tit)
                    echo ($tit->plaintext).'<br>';
                    $kk++;

            }

        }
        return $kk;
    }

    public function demo() {
        // $str = "bui huy cuong   ds ! #gffhjgyssd%^*#";
        // return str_slug($str);

        $html = "https://khoinghieptre.vn/3-chien-luoc-marketing-can-thiet-cho-startup-trong-nam-2017/";
        $dom = HtmlDomParser::file_get_html($html);
        $content = $dom->find('div#content-main', 0);

        return $content->innertext;

    }
    
    
}
