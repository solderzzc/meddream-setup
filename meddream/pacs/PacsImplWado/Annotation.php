<?php

namespace Softneta\MedDream\Core\Pacs\Wado;

use Softneta\MedDream\Core\Pacs\AnnotationIface;
use Softneta\MedDream\Core\Pacs\AnnotationAbstract;


/** @brief Implementation of AnnotationIface for <tt>$pacs='WADO'</tt>.

	This class is empty as AnnotationAbstract provides enough functionality.
	In turn, Loader::load() still expects a file.
*/
class PacsPartAnnotation extends AnnotationAbstract implements AnnotationIface
{
}
