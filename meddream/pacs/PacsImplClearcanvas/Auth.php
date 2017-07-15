<?php

namespace Softneta\MedDream\Core\Pacs\Clearcanvas;

use Softneta\MedDream\Core\Pacs\AuthIface;
use Softneta\MedDream\Core\Pacs\AuthAbstract;


/** @brief Implementation of AuthIface for <tt>$pacs='ClearCanvas'</tt>. */
class PacsPartAuth extends AuthAbstract implements AuthIface
{
	public function hasPrivilege($privilege)
	{
		/* superusers can do everything */
		if (strlen($this->commonData['admin_username']))
			if ($this->commonData['admin_username'] == $this->authDB->getAuthUser(true))
				return 1;
		if ($this->authDB->getAuthUser(true) == "sa")
			return 1;

		/* remaining functions, ordinary users */
		if ($privilege == 'share')
			return 1;
		if (($privilege == "view") || ($privilege == "viewprivate") ||
				($privilege == "export") || ($privilege == "upload") ||
				($privilege == "forward"))
			return 1;
			/* forward, export and upload are available to everybody under most
			   PACSes.

			   In MedDream, "upload" controls MedReport integration (this
			   privilege is one of conditions to display corresponding icons
			   in the UI)
			 */

		return 0;
	}
}
