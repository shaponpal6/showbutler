<h4>Showbutler WordPress Plugin</h4>

###Show Hide Button On included time.

****** Table of Contents ********
1. Show/hide on only Datetime range | Default: hide
2. only Hide on Date | Default: show
3. Repeater Mode
**********************************

#######
* means required
- means optional
#######

----------------------------------------------------------
################################################################################
1. Show/hide on only Datetime range
################################################################################

***For only show Button in datetime range

*** Shortcode Attributies ***

type="show" |-| Default: show
show_date="d.m.Y" |*| Format: 15.8.2020 / 15 August 2020 | -- Show on this date
show_time="H:i:s" |*| Default: 00:00:00                  | -- Show on this time
hide_date="d.m.Y" |*| Format: 15.8.2020 / 15 August 2020 | -- hide on this date
hide_time="H:i:s" |*| Default: 00:00:00                  | -- hide on this time

*****************

Example: 

<<<<<<< HEAD
=======
***Show Button

<code>
>>>>>>> 8fc123122d74243f4f5f413085b7700223ccc69c
[showbutler show_date="15 August 2020" show_time="01:34:00" hide_date="15 August 2020" hide_time="01:55:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]
</code>



################################################################################
2. only Hide on Date | Default: show 
################################################################################

***For only Hide Button use type hide and hide date time

<<<<<<< HEAD
*** Shortcode Attributies ***

type="hide" |-| Default: show
hide_date="d.m.Y" |*| Format: 15.8.2020 / 15 August 2020 | -- hide on this date
hide_time="H:i:s" |*| Default: 00:00:00                  | -- hide on this time

*****************

[showbutler type="hide" hide_date="15 August 2020" hide_time="01:55:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]



################################################################################
3. Repeater Mode on only Datetime range
################################################################################

***For only show Button in datetime range

*** Shortcode Attributies ***

type="repeater" |-| Default: show

recurring_mode="" |*| Default: everyday | choose Mode --- 'everyday', 'everyweek', 'everymonth', 'everyworkday', 'every day', 'every week', 'every month', 'every work-day'

recurring_days="" |*| Default: '' | Allow days --- 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' | -- Use multiple days with comma(,) seperator

recurring_offdays="" |*| Default: 'Sat, Sun' | Not Allow days(offdays) --- 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' | -- Use multiple days with comma(,) seperator

recurring_dates="" |*| Default: '' | Allow dates --- Valid date only like 1, 2, 3, ...... | -- Use multiple dates  with comma(,) seperator

show_time="H:i:s" |*| Default: 00:00:00                  | -- Show on this time
hide_time="H:i:s" |*| Default: 00:00:00                  | -- hide on this time

*****************


######## Example: #######

####################################
####### Recurring Every day ########
####################################

[showbutler type="repeater" recurring_mode="everyday" show_time="07:47:00" hide_time="19:51:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]


##################################################
####### Recurring some days of Every week ########
##################################################

[showbutler type="repeater" recurring_mode="everyweek" recurring_days="Sun, Mon, Tue" show_time="07:47:00" hide_time="19:51:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]


##################################################
####### Recurring Every working day ##############
##################################################

[showbutler type="repeater" recurring_mode="everyworkday" recurring_offdays="Sat, Sun" show_time="07:47:00" hide_time="19:51:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]


##################################################
####### Recurring some dates in month ############
##################################################

[showbutler type="repeater" recurring_mode="everymonth" recurring_dates="23, 24" show_time="07:47:00" hide_time="19:51:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]
=======

<code>
[showbutler type="hide" hide_date="15 August 2020" hide_time="01:55:00"]
<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
[/showbutler]
</code>
>>>>>>> 8fc123122d74243f4f5f413085b7700223ccc69c
