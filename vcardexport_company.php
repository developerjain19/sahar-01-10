<?php

use JeroenDesloovere\VCard\VCard;

class VcardExport
{

    public function contactVcardExportService($contactResult)
    {
        require_once 'vendor/Behat-Transliterator/Transliterator.php';
        require_once 'vendor/jeroendesloovere-vcard/VCard.php';
        // define vcard
        $vcardObj = new VCard();

        // add personal data
        $vcardObj->addName($contactResult["company_name"]);
        $vcardObj->addBirthday($contactResult["company_website_link"]);
        $vcardObj->addEmail($contactResult["company_email"]);
        $vcardObj->addPhoneNumber($contactResult["company_contact"]);
        $vcardObj->addAddress($contactResult["company_address"]);

        return $vcardObj->download();

        redirect($_SERVER['HTTP_REFERER']);
    }
}
