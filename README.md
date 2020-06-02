# Introduction
This extension is base on the [mediatis/formrelay](https://github.com/mediatis/formrelay) package and you and use it to get the data of any TYPO3/form (or other form extensions that are supported by formrelay) to Salesforce. We use the Web2Case API of Salesforce, so all your triggers you defined in SFDC will be fired.

You should checkout  https://github.com/mediatis/formrelay to find more detail how use the plugin.

# Installation

`composer require mediatis/formrelay-salesforce-case`

# Support
If you have any question, please contact us info@mediatis.de

# Setup

All basic settings, explained in EXT:formrelay, (including the overwrite mechanics) apply to this extension as well.  

## plugin.tx_formrelay_salesforce_case.settings.enabled

Default: `0`.

Set to `1` to enable the extension.

## plugin.tx_formrelay_salesforce_case.settings.salesForceUrl

Default: `https://{XYZ}.my.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8`.

Set the URL of the SFDC Web-To-CaseAPI.

## plugin.tx_formrelay_salesforce_case.settings.defaults.orgid 

Default: none.

## plugin.tx_formrelay_salesforce_case.settings.defaults.debug

Default: none.

## plugin.tx_formrelay_salesforce_case.settings.defaults.debugEmail

Default: none.

## plugin.tx_formrelay_salesforce_case.settings.fields.mapping

## plugin.tx_formrelay_salesforce_case.settings.values.mapping
