


<form id="formProfil" action="profil.php" method="post" id="signupForm" enctype="multipart/form-data" >

    <div class="fieldContainer">

            <div >
                <label for="username"><?=Dict::_('NAME')?></label>
                <input type="text" name="username" maxlength="15" id="username" placeholder="<?php echo  ucfirst($sname); ?>" value="<?php echo  ucfirst($sname); ?>" />
            </div>
           
            <div >
                <label for="secondname"><?=Dict::_('SECONDNAME')?></label>
                <input type="text" name="secondname" id="secondname" placeholder="<?php echo ucfirst ($secondname); ?>" value="<?php echo  ucfirst($secondname); ?>" />
            </div>
       
        
       
            <div >
                <label for="work">Sex:</label>
                <select name="sex">
            <option><?php echo  $sex; ?></option>
            <option>Male</option>
            <option>Female</option>
                </select>
            </div>

    

   <div>       
        <label ><?=Dict::_('COUNTRY')?></label>
        <input  type="text" name="country" placeholder="<?php echo  $country; ?>" value="<?php echo  $country; ?>" />
           
   </div>
        
        <div>       
        <label ><?=Dict::_('AGE')?></label>
        <select name="age">
            <option><?php echo  $age; ?></option>
        <?php 
for($value = 18; $value <= 100; $value++){ 
    echo('<option value="' . $value . '">' . $value . '</option>');
}
?></select>
        </div>
       
  
        
        
   <div>       
        <label ><?=Dict::_('CITY')?></label>
        <input  type="text" name="city" placeholder="<?php echo  $city; ?>" value="<?php echo  $city; ?>" />
            </div>
        
        <div class="checkboxInterest">
      <h3><?=Dict::_('YOUR_INTERESTS')?>:</h3>
    <label><?=Dict::_('TR')?>:</label> 
<input type="checkbox" name="check_list[]" value="Traveling"><br/>
<label><?=Dict::_('FOR_LANG')?>:</label>
<input type="checkbox" name="check_list[]" value="Foreign Languages"><br/>
<label><?=Dict::_('BOOKS')?>:</label>
<input type="checkbox" name="check_list[]" value="Books"><br/>
<label><?=Dict::_('DESIGN')?>:</label>
<input type="checkbox" name="check_list[]" value="Design"><br/>
<label><?=Dict::_('WEB_T')?>:</label>
<input type="checkbox" name="check_list[]" value="Web Technologies"><br/>
<label><?=Dict::_('MOVIES')?>:</label>
<input type="checkbox" name="check_list[]" value="Movies"><br/>
<label><?=Dict::_('LINK1')?>:</label>
<input type="checkbox" name="check_list[]" value="Culture"><br/>
  </div>
        
   <div>       
        <label ><?=Dict::_('FAV_MOVIES')?>:</label>
        <input  type="text" name="movies" placeholder="<?php echo  $movies; ?>" value="<?php echo  $movies; ?>" />
            </div>   
    
    <div>       
        <label ><?=Dict::_('FAV_MUSIC')?>:</label>
        <input  type="text" name="music" placeholder="<?php echo  $music; ?>" value="<?php echo  $music; ?>" />
            </div>
   
    <div>       
        <label ><?=Dict::_('BIO')?>:</label>
        <textarea rows="10" cols="15"  maxlength="500" name="bio" placeholder="<?php echo  $bio; ?>" ><?php echo  $bio; ?></textarea>
     </div>    
        
     <div>       
        <label ><?=Dict::_('VIS_COUNTRIES')?>:</label>
        <input  type="text" name="countryVisited" placeholder="<?php echo  $countryVisited; ?>" value="<?php echo  $countryVisited; ?>" />
            
     
     </div>    
     
    <div>       
        <label ><?=Dict::_('SP_LANGUAGE')?>:</label>
        <select name="languages[]" multiple>
            <option><?php echo  $languages; ?></option>
   <?php 
   $language_codes = array(
        'en' => 'English' , 
        'aa' => 'Afar' , 
        'ab' => 'Abkhazian' , 
        'af' => 'Afrikaans' , 
        'am' => 'Amharic' , 
        'ar' => 'Arabic' , 
        'as' => 'Assamese' , 
        'ay' => 'Aymara' , 
        'az' => 'Azerbaijani' , 
        'ba' => 'Bashkir' , 
        'be' => 'Byelorussian' , 
        'bg' => 'Bulgarian' , 
        'bh' => 'Bihari' , 
        'bi' => 'Bislama' , 
        'bn' => 'Bengali/Bangla' , 
        'bo' => 'Tibetan' , 
        'br' => 'Breton' , 
        'ca' => 'Catalan' , 
        'co' => 'Corsican' , 
        'cs' => 'Czech' , 
        'cy' => 'Welsh' , 
        'da' => 'Danish' , 
        'de' => 'German' , 
        'dz' => 'Bhutani' , 
        'el' => 'Greek' , 
        'eo' => 'Esperanto' , 
        'es' => 'Spanish' , 
        'et' => 'Estonian' , 
        'eu' => 'Basque' , 
        'fa' => 'Persian' , 
        'fi' => 'Finnish' , 
        'fj' => 'Fiji' , 
        'fo' => 'Faeroese' , 
        'fr' => 'French' , 
        'fy' => 'Frisian' , 
        'ga' => 'Irish' , 
        'gd' => 'Scots/Gaelic' , 
        'gl' => 'Galician' , 
        'gn' => 'Guarani' , 
        'gu' => 'Gujarati' , 
        'ha' => 'Hausa' , 
        'hi' => 'Hindi' , 
        'hr' => 'Croatian' , 
        'hu' => 'Hungarian' , 
        'hy' => 'Armenian' , 
        'ia' => 'Interlingua' , 
        'ie' => 'Interlingue' , 
        'ik' => 'Inupiak' , 
        'in' => 'Indonesian' , 
        'is' => 'Icelandic' , 
        'it' => 'Italian' , 
        'iw' => 'Hebrew' , 
        'ja' => 'Japanese' , 
        'ji' => 'Yiddish' , 
        'jw' => 'Javanese' , 
        'ka' => 'Georgian' , 
        'kk' => 'Kazakh' , 
        'kl' => 'Greenlandic' , 
        'km' => 'Cambodian' , 
        'kn' => 'Kannada' , 
        'ko' => 'Korean' , 
        'ks' => 'Kashmiri' , 
        'ku' => 'Kurdish' , 
        'ky' => 'Kirghiz' , 
        'la' => 'Latin' , 
        'ln' => 'Lingala' , 
        'lo' => 'Laothian' , 
        'lt' => 'Lithuanian' , 
        'lv' => 'Latvian/Lettish' , 
        'mg' => 'Malagasy' , 
        'mi' => 'Maori' , 
        'mk' => 'Macedonian' , 
        'ml' => 'Malayalam' , 
        'mn' => 'Mongolian' , 
        'mo' => 'Moldavian' , 
        'mr' => 'Marathi' , 
        'ms' => 'Malay' , 
        'mt' => 'Maltese' , 
        'my' => 'Burmese' , 
        'na' => 'Nauru' , 
        'ne' => 'Nepali' , 
        'nl' => 'Dutch' , 
        'no' => 'Norwegian' , 
        'oc' => 'Occitan' , 
        'om' => '(Afan)/Oromoor/Oriya' , 
        'pa' => 'Punjabi' , 
        'pl' => 'Polish' , 
        'ps' => 'Pashto/Pushto' , 
        'pt' => 'Portuguese' , 
        'qu' => 'Quechua' , 
        'rm' => 'Rhaeto-Romance' , 
        'rn' => 'Kirundi' , 
        'ro' => 'Romanian' , 
        'ru' => 'Russian' , 
        'rw' => 'Kinyarwanda' , 
        'sa' => 'Sanskrit' , 
        'sd' => 'Sindhi' , 
        'sg' => 'Sangro' , 
        'sh' => 'Serbo-Croatian' , 
        'si' => 'Singhalese' , 
        'sk' => 'Slovak' , 
        'sl' => 'Slovenian' , 
        'sm' => 'Samoan' , 
        'sn' => 'Shona' , 
        'so' => 'Somali' , 
        'sq' => 'Albanian' , 
        'sr' => 'Serbian' , 
        'ss' => 'Siswati' , 
        'st' => 'Sesotho' , 
        'su' => 'Sundanese' , 
        'sv' => 'Swedish' , 
        'sw' => 'Swahili' , 
        'ta' => 'Tamil' , 
        'te' => 'Tegulu' , 
        'tg' => 'Tajik' , 
        'th' => 'Thai' , 
        'ti' => 'Tigrinya' , 
        'tk' => 'Turkmen' , 
        'tl' => 'Tagalog' , 
        'tn' => 'Setswana' , 
        'to' => 'Tonga' , 
        'tr' => 'Turkish' , 
        'ts' => 'Tsonga' , 
        'tt' => 'Tatar' , 
        'tw' => 'Twi' , 
        'uk' => 'Ukrainian' , 
        'ur' => 'Urdu' , 
        'uz' => 'Uzbek' , 
        'vi' => 'Vietnamese' , 
        'vo' => 'Volapuk' , 
        'wo' => 'Wolof' , 
        'xh' => 'Xhosa' , 
        'yo' => 'Yoruba' , 
        'zh' => 'Chinese' , 
        'zu' => 'Zulu' , 
        );
 foreach ($language_codes as $key=>$value)
{
    echo('<option value="' . $value . '">' . $value . '</option>'); 
}
   ?>
        </select>
    </div>    
        
 
    </div> 
    
    <div >
        <input type="submit" name="submit" id="submit" value="<?=Dict::_('SAVE')?>" onclick="formHide()"/>
    </div>
    
    </form>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>    
