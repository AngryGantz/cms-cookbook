<?php
namespace App\Helpers;
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 24.12.15
 * Time: 20:31
 */

use App\Models\CmsOption;
use App\Marker;

class Meta {
    /**
     * Agregate metakeywords for view.
     *
     * @param $metaOptions
     * @return string
     */
    public static function getMetaKeywords($metaOptions)
    {
        $mk = CmsOption::getValue('metakey');
        if (isset($metaOptions['marker'])) $mk = $mk.','.$metaOptions['marker']->metakey;
        if (isset($metaOptions['recipie'])) {
           foreach($metaOptions['recipie']->markers as $marker) {
               $mk = $mk.','.$marker->metakey;
           }
           $mk = $mk.','.$metaOptions['recipie']->metakey;
        }
        if (isset($metaOptions['filter'])) {
            foreach($metaOptions['filter'] as $idMarker) {
                If($idMarker>0) {
                    $marker=Marker::find($idMarker);
                    if($marker->metakey != '') $mk = $mk.','.$marker->metakey;

                }
            }
        }
        return $mk;
    }

    /**
     * Agregate meta description for view
     *
     * @param $metaOptions
     * @return string
     */
    public static function getMetaDesc($metaOptions)
    {
        $mk = CmsOption::getValue('metadesc');
        if (isset($metaOptions['marker'])) $mk = $mk.','.$metaOptions['marker']->metadesc;
        if (isset($metaOptions['recipie'])) {
            foreach($metaOptions['recipie']->markers as $marker) {
                $mk = $mk.','.$marker->metadesk;
            }
            $mk = $mk.','.$metaOptions['recipie']->metadesc;
        }
        if (isset($metaOptions['filter'])) {
            foreach($metaOptions['filter'] as $idMarker) {
                If($idMarker>0) {
                    $marker=Marker::find($idMarker);
                    if($marker->metadesk != '') $mk = $mk.','.$marker->metadesk;
                }
            }
        }
        return $mk;
    }

}
