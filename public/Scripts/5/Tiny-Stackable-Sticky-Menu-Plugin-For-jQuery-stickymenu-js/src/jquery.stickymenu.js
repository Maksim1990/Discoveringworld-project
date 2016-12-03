/*
 * Module: JQuery Sticky Menu Plugin
 * Version: 1.1.1
 * Author: Chaikin Evgenii
 * Release date: 28 Oct 2015
 * Updated: 31 Oct 2015
 * Site: http://www.fater.ru
 * Dependencies: JQuery
 * */

(function ($)
{
	$.stickymenu = function (options)
	{
		var st = 0;
		var ob = 'stickymenu';
		$ ($ (document)).ready (function ()
		{
			if (options)
			{
				if (options.object_id)
				{
					ob = options.object_id;
				}
				if (options.standoff)
				{
					st = options.standoff;
				}
				else if (options.standoff_object_id)
				{
					st = $ ('#' + options.standoff_object_id).parent ().height ();
				}
			}

			var o = $ ('#' + ob);
			var top = o.offset ().top,
				parent_height = o.parent ().height (),
				width = o.width ();
			o.parent ().height (parent_height);

			$ (window).on ('load scroll', function ()
			{
				if (($ (document).scrollTop () + st) >= top)
				{
					if (o.css ('position') != 'fixed')
					{
						o.css ({position: 'fixed', top: st, width: width});
					}
				}
				else if (o.css ('position') == 'fixed')
				{
					o.css ({position: ''});
				}
			});
		});
	}
}) (jQuery);