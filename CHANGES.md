## Version 1.11.0
- [FEATURE] Add Example TCA for link field
- [FEATURE] Add Example TCA for category

## Version 1.10.0
- [IMPORTANT] const in Trait does not work in later PHP versions, so we use static string. Therefore we need to change arguments for getFileTCA, getMediaTCA, getImageTCA
- [FEATURE] Add example downloadAction
- [FEATURE] Add ArrayPagination
- [FEATURE] Add example TCA for starttime and endtime
- [BUGFIX] Dont use TCA definition from hidden, configure itself

## Version 1.9.0
- [FEATURE] Example how to load and store data from session
- [FEATURE] Add recommended Powermail Settings

## Version 1.8.0
- [FEATURE] Add Example QueryBuilderPagination
- [CHANGE] Rename folder Flexforms to FlexForm

## Version 1.7.2
- [FEATURE] Add getSelectTCADef
- [BUGFIX] Add Namespace for AsCommand

## Version 1.7.1
- [BUGFIX] Correctly set values for exclude and required in TCA

## Version 1.7.0
- [FEATURE] Add ContainerRegistry
- [FEATURE] Add example of HMENU language

## Version 1.6.0
- [FEATURE] Add getJsonTCADef to TcaTrait
- [FEATURE] ExtensionTrait add getLLLForCoreLabels
- [FEATURE] Add getNumberTCADef, getSlugTCADef
- [CHANGE] Update datetime field TCA definition

## Version 1.5.0
- [FEATURE] Add $additionalConfig argument to extend the TCA def for the default tca field functions
- [FEATURE] Add getTextareaCADef to TcaTrait

## Version 1.4.0
- [FEATURE] Add usefull TCAdefaults.tsconfig settings

## Version 1.3.0
- [FEATURE] Add examples for HMENU

## Version 1.2.0
- [FEATURE] Add Extbase/RepositoryUtility
- [FEATURE] Add ExtensionTrait: registerFlexformToCType

## Version 1.1.0
- [FEATURE] TcaTrait: Add getDateTCADef
- [FEATURE] Add Example Command

## Version 1.0.0
- [FEATURE] ExtensionTrait: Add registerRTEPreset and getConfigPath
- [FEATURE] Add .editorconfig with TYPO3 config

## Version 0.0.10
- [FEATURE] Example on how to throw 404 error in action function
- [CHANGE] Moved several functions related to extensionKey from Base to ExtensionTrait

## Version 0.0.9
- [FEATURE] Add Icons.php
- [FEATURE] Example how to include Social Media Favicons

## Version 0.0.8
- [FEATURE] TcaTrait: Add def for simple checkbox field

## Version 0.0.7
- [FEATURE] Add example on how to configure plugin
- [FEATURE] Add example ActionController, Domain Model and Repository
- [FEATURE] Add example Extbase/Persistence/Classes
- [FEATURE] Add example for QueryResultPagination
- [FEATURE] Add Base->registerFlexform
- [FEATURE] Add example FileUploadService

## Version 0.0.6
- [FEATURE] Add example language file
- [FEATURE] Add lib.dynamicContent to flexible read content elements
- [FEATURE] Add basic setup for PageTS
- [FEATURE] Add basic Services.yaml
- [FEATURE] Add basic ext_localconf.php implementation with RTE Preset
- [FEATURE] Add TCATrait with some basic definition for several config types

## Version 0.0.5
- [FEATURE] Add TypoScript files with PAGE object
- [FEATURE] Base Page Template: OneColumn
- [FEATURE] Add Bootstrap Classes with TypoScript Registration

## Version 0.0.4
- [IMPORTANT] Intitial commmit
- [FEATURE] Add distribution-composer.json
- [FEATURE] Add ext_emconf.php
