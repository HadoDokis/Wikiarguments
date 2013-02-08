<?
/********************************************************************************
 * The contents of this file are subject to the Common Public Attribution License
 * Version 1.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at
 * http://www.wikiarguments.net/license/. The License is based on the Mozilla
 * Public License Version 1.1 but Sections 14 and 15 have been added to cover
 * use of software over a computer network and provide for limited attribution
 * for the Original Developer. In addition, Exhibit A has been modified to be
 * consistent with Exhibit B.
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 *
 * The Original Code is Wikiarguments. The Original Developer is the Initial
 * Developer and is Wikiarguments GbR. All portions of the code written by
 * Wikiarguments GbR are Copyright (c) 2012. All Rights Reserved.
 * Contributor(s):
 *     Andreas Wierz (andreas.wierz@gmail.com).
 *
 * Attribution Information
 * Attribution Phrase (not exceeding 10 words): Powered by Wikiarguments
 * Attribution URL: http://www.wikiarguments.net
 *
 * This display should be, at a minimum, the Attribution Phrase displayed in the
 * footer of the page and linked to the Attribution URL. The link to the Attribution
 * URL must not contain any form of 'nofollow' attribute.
 *
 * Display of Attribution Information is required in Larger Works which are
 * defined in the CPAL as a work which combines Covered Code or portions
 * thereof with code not governed by the terms of the CPAL.
 *******************************************************************************/

global $sTemplate, $sUser, $sDB, $sPacket, $sPage;

$page       = "";
$language   = $sTemplate->getLangBase();
?>
<? include($sTemplate->getTemplateRootAbs()."header.php"); ?>

<div id = "content_wide">
  <div class = "thin">
<?
drawQuestionBoxExtended($sPage->getQuestion(), $sPage->getView(), $sPage->basePath());
?>

    <form action = "" method = "POST" id = "edit_argument">
      <div class = "new_argument">
        <div class = "row">
          <div class = "label"><? echo $sTemplate->getString("NEW_ARGUMENT_HEADLINE"); ?></div>
          <div class = "input">
            <textarea id = "new_argument_headline" name = "new_argument_headline" maxlength="<? echo MAX_ARGUMENT_HEADLINE_CHR_LENGTH;?> "><? echo $sPage->argument()->headlinePlain(); ?></textarea>
            <span class="characters_left"><span id="argument_headline_chars_left"><? echo MAX_ARGUMENT_HEADLINE_CHR_LENGTH - strlen($sPage->argument()->headlinePlain());?></span> <? echo $sTemplate->getString("CHARS_WRITTEN_LEFT"); ?></span>
          </div>
        </div>

        <div class = "row">
          <div class = "label"><? echo $sTemplate->getString("NEW_ARGUMENT_ABSTRACT"); ?></div>
          <div class = "input">
            <textarea id = "new_argument_abstract" name = "new_argument_abstract" maxlength="<? echo MAX_ARGUMENT_ABS_CHR_LENGTH;?>"><? echo $sPage->argument()->abstractTextPlain(); ?></textarea>
            <span class="characters_left"><span id="argument_headline_abs_chars_left"><? echo MAX_ARGUMENT_ABS_CHR_LENGTH - strlen($sPage->argument()->abstractTextPlain());?></span> <? echo $sTemplate->getString("CHARS_WRITTEN_LEFT"); ?></span>
          </div>
        </div>

        <div class = "row">
          <div class = "label"><? echo $sTemplate->getString("NEW_ARGUMENT_DETAILS"); ?></div>
          <div class = "input">
            <textarea id = "new_argument_details" name = "new_argument_details"><? echo $sPage->argument()->detailsPlain(); ?></textarea>
            <span class="characters_written"><span id="argument_details_chars_written"><? echo strlen($sPage->argument()->detailsPlain()); ?></span> <? echo $sTemplate->getString("CHARS_WRITTEN"); ?></span>
          </div>
        </div>

        <div class = "row row_submit">
        <button class = "button_orange" id = "buttonSubmit" onclick = "wikiargument.submitArgument('#edit_argument', '#buttonSubmit'); return false;"><? echo $sTemplate->getString("SUBMIT_NEW_ARGUMENT"); ?></button>
        </div>
        <input type = "hidden" name = "edit_argument" value = "1" />
      </div>
    </form>

  </div>
</div>

<? include($sTemplate->getTemplateRootAbs()."footer.php"); ?>
