    <div class="wrapper">
   </pre>
	
				<div id="widget">
					<div id="widgetField">
			
						<a href="#"></a>
					</div>
					<div id="widgetCalendar">
					</div>
				</div>
		
            </div>
            <div class="tab">
                <h2>Download</h2>
                <p><a href="datepicker.zip">datepicker.zip (50 kb)</a>: jQuery, Javscript files, CSS files, images, examples and instructions.</p>
                <h3>Changelog</h3>
                <dl>
					<dt>22.05.2009</dt>
					<dd>added: close on selection example</dd>
					<dd>added: onChange has  new parameter: reference to related element</dd>
					<dd>added: start view days, months, years</dd>
					<dd>added: clear selection in multiple and range mode</dd>
					<dd>fixed: datepicker hide and show methods</dd>
					<dd>fixed: january selection (tahns to Konstantin Zavialov)</dd>
					<dd>fixed: working with jQuery 1.3</dd>
					<dd>fixed: deselecting a date in multiple mode (thanks to Geelen Sebastien)</dd>
					<dt>22.08.2008</dt>
					<dd>Fixed bug: where some events were not canceled right on Safari</dd>
					<dd>Fixed bug: where teh view port was not detected right on Safari</dd>
					<dt>31.07.2008</dt>
					<dd>Added new method: 'DatePickerGetDate'</dd>
					<dd>Minor speed improvement</dd>
					<dt>30.07.2008</dt>
					<dd>The first release.</dd>
                </dl>
            </div>
            <div class="tab">
                <h2>Implement</h2>
                <p>Attach the Javascript and CSS files to your document. Edit CSS file and fix the paths to  images and change colors to fit your site theme.</p>
                <pre>
&lt;link rel="stylesheet" media="screen" type="text/css" href="css/datepicker.css" /&gt;
&lt;script type="text/javascript" src="js/datepicker.js"&gt;&lt;/script&gt;
                </pre>
                <h3>Invocation code</h3>
                <p>All you have to do is to select the elements in a jQuery way and call the plugin.</p>
                <pre>
 $('input').DatePicker(options);
                </pre>
                <h3>Options</h3>
                <p>A hash of parameters. All parameters are optional.</p>
                <table>
                	<tr>
                		<td><strong>eventName</strong></td>
                		<td>string</td>
                		<td>The desired event to trigger the date picker. Default: 'click'</td>
                	</tr>
                	<tr>
                		<td><strong>date</strong></td>
                		<td>String, Date or array</td>
                		<td>The selected date(s) as string (will be converted to Date object based on teh format suplied) and Date object for single selection, as Array of strings or Date objects</td>
                	</tr>
                	<tr>
                		<td><strong>flat</strong></td>
                		<td>boolean</td>
                		<td>Whatever if the date picker is appended to the element or triggered by an event. Default false</td>
                	</tr>
                	<tr>
                		<td><strong>start</strong></td>
                		<td>integer</td>
                		<td>The day week start. Default 1 (monday)</td>
                	</tr>
                	<tr>
                		<td><strong>prev</strong></td>
                		<td>string</td>
                		<td>HTML inserted to previous links. Default '&#9664;' (UNICODE black left arrow)</td>
                	</tr>
                	<tr>
                		<td><strong>next</strong></td>
                		<td>string</td>
                		<td>HTML inserted to next links. Default '&#9654;' (UNICODE black right arrow)</td>
                	</tr>
                	<tr>
                		<td><strong>mode</strong></td>
                		<td>string ['single'|'multiple'|'range']</td>
                		<td>Date selection mode. Default 'single'</td>
                	</tr>
					<tr>
                		<td><strong>view</strong></td>
                		<td>string ['days'|'months'|'years']</td>
                		<td>Start view mode. Default 'days'</td>
					</tr>
                	<tr>
                		<td><strong>calendars</strong></td>
                		<td>integer</td>
                		<td>Number of calendars to render inside the date picker. Default 1</td>
                	</tr>
                	<tr>
                		<td><strong>format</strong></td>
                		<td>string</td>
                		<td>Date format. Default 'Y-m-d'</td>
                	</tr>
                	<tr>
                		<td><strong>position</strong></td>
                		<td>string ['top'|'left'|'right'|'bottom']</td>
                		<td>Date picker's position relative to the trigegr element (non flat mode only). Default 'bottom'</td>
                	</tr>
                	<tr>
                		<td><strong>locale</strong></td>
                		<td>hash</td>
                		<td>Location: provide a hash with keys 'days', 'daysShort', 'daysMin', 'months', 'monthsShort', 'week'. Default english</td>
                	</tr>
                	<tr>
                		<td><strong>onShow</strong></td>
                		<td>function</td>
                		<td>Callback function triggered when the date picker is shown</td>
                	</tr>
                	<tr>
                		<td><strong>onBeforeShow</strong></td>
                		<td>function</td>
                		<td>Callback function triggered before the date picker is shown</td>
                	</tr>
                	<tr>
                		<td><strong>onHide</strong></td>
                		<td>function</td>
                		<td>Callback function triggered when the date picker is hidden</td>
                	</tr>
                	<tr>
                		<td><strong>onChange</strong></td>
                		<td>function</td>
                		<td>Callback function triggered when the date is changed</td>
                	</tr>
                	<tr>
                		<td><strong>onRender</strong></td>
                		<td>function</td>
                		<td>Callback function triggered when the date is rendered inside a calendar. It should return and hash with keys: 'selected' to select the date, 'disabled' to disable the date, 'className' for additional CSS class</td>
                	</tr>
                </table>
                <h3>Set date</h3>
                <p>If you want to set a diferent date selection.</p>
                <pre>$('input').DatePickerSetDate(date, shiftTo);</pre>
				<p>The 'date' argument is the same format as the option 'date' and the 'shiftTo' argument (boolean) moves the curent month view to the date selection provided.</p>
				<h3>Get date</h3>
				<p>Get date selection.</p>
				<pre>$('input').DatePickerGetDate(formated);</pre>
				<p>Set 'formated' to true if you whant to get teh selection formated.</p>
				<h3>Show and hide date picker</h3>
                <p>Show or hide a date picker.</p>
				<pre>$('input').DatePickerShow();</pre>
				<pre>$('input').DatePickerHide();</pre>
				<h3>Clear multiple selection</h3>
				<p>Clear selection in multiple and range mode</p>
				<pre>$('#datepicker').DatePickerClear();</pre>
            </div>
       