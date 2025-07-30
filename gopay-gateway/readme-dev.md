# GoPay WooCommerce Integration

## Table of Contents

- [About the Project](#about-the-project)
  - [Built With](#built-with)
- [Development](#development)
  - [Prerequisites](#prerequisites)
  - [Installation](#instalation)
  - [Run project](#run-project)
  - [Project Structure](#project-structure)
  - [Migrations](#migrations)
  - [Library update](#library-update)
  - [Testing](#testing)
- [Versioning](#versioning)
  - [Contribution](#contribution)
  - [Contribution process in details](#contribution-process-in-details)
  - [Branch consistency across repositories](#branch-consistency-across-repositories)
- [Deployment](#deployment)
- [Internationalization](#internationalization)
  - [Add new language](#add-new-language)
  - [Update an existing language](#update-an-existing-language)
- [Documentation](#documentation)
- [Other useful links](#other-useful-links)

## About The Project

GoPay payment gateway integration with the WooCommerce plugin eCommerce platform built on WordPress.

### Built With

- [GoPay's PHP SDK for Payments REST API](https://github.com/gopaycommunity/gopay-php-api)
- [Composer](https://getcomposer.org/)

## Development

Running project on local machine for development and testing purposes.

### Prerequisites

- [PHP](https://www.php.net)
- [WordPress](https://wordpress.org/)
- [WooCommerce](https://woocommerce.com)
- [WooCommerce Subscriptions](https://woocommerce.com/document/subscriptions/)*

###### * *WooCommerce Subscriptions must be installed if you need to deal with recurring payments.*

### Instalation

For local project execution, first install WordPress and WooCommerce, then upload and configure the plugin by following the steps below:
1. Clone GitHub repository to your local machine.
2. Copy the plugin files to the '/wp-content/plugins/' directory, or install the plugin through the WordPress plugins screen directly.

### Run project
1. Once the plugin is installed to the project, proceed with activating and performing basic configuration.
2. Activate the plugin through the Plugins screen in WordPress.
3. Configure the plugin by providing goid, client id and secret to load the other options (follow these [steps](https://help.gopay.com/en/knowledge-base/gopay-account/gopay-business-account/signing-in-password-reset-activating-and-deactivating-the-payment-gateway/how-to-activate-the-payment-gateway) to activate the payment gateway and get goid, client id and secret).
4. Finally, choose the options you want to be available in the payment gateway (payment methods and banks must be enabled in your GoPay account).

### Project Structure

- **`admin`**
  - **`css`**
  - **`js`**
  - **`views`**
- **`includes`**
  - **`assets`**
- **`languages`**
- **`vendor`**
- **`readme-dev.md`**

### Migrations

### Library update
1. Open Terminal: Navigate to your project directory using Terminal.
2. Run composer update command for the library: Use the following command, replacing 'library-name' with the actual name of the library you want to update:
```sh
$ composer update vendor/library-name
```
For example:
```sh
$ composer update guzzlehttp/guzzle
```
Command will update the specified library to the latest version.

3. Review changes: After running the composer update command, review the changes made to your composer.lock file and your vendor directory. The composer.lock file will contain the exact versions of all libraries and dependencies installed in your project.
4. Test plugin: Once the libraries are updated, it's essential to thoroughly test the plugin to ensure that everything is working as expected with the updated dependencies.
5. Commit changes: Don't forget to commit the changes to composer.json, composer.lock, and vendor directory after updating library.
6. Update README (if necessary): If any significant changes occur due to the library updates, make sure to update your README file to reflect those changes. This could include new dependencies, updated requirements, or any other relevant information.

### Testing
1. Perform test transactions: Execute a variety of test transactions using different scenarios. Access the URL provided for all product [requirements](https://argo22.atlassian.net/wiki/spaces/GPY020/pages/2932703233/Product+requirements). Verify that the plugin handles each scenario appropriately and provides accurate behaviour to the end-user.
2. Exploring the utilization of monitoring plugins like [Query Monitor](https://wordpress.org/plugins/query-monitor), [Debug Log Manager](https://wordpress.org/plugins/debug-log-manager) or other viable alternatives is recommended, given their substantial utility in debugging scenarios.
3. Check order processing: After completing test transactions, verify that orders are processed correctly within WooCommerce. Ensure that order details, payment statuses, and transaction logs are accurately recorded and reflected in the WooCommerce dashboard.
4. Inspect and review the `debug.log` file within your project directory. The log file often contains valuable information regarding errors, warnings, and other debug messages generated during the testing process. Pay close attention to any entries related to the functionality being tested.
5. In the Wordpress admin panel, navigate to the GoPay gateway's Log section for comprehensive transaction insights. This dedicated Log section provides detailed records of all transactions processed through the GoPay gateway, offering valuable insights into payment statuses, transaction IDs, timestamps, and any potential errors encountered during the payment process.
6. Test compatibility: Ensuring compatibility with WooCommerce is our primary objective during the development and testing phases of the plugin. However, due to the diverse ecosystem of WordPress plugins and the unique configurations that users may employ, we cannot guarantee seamless compatibility with every plugin or user setting.
7. Review error handling: Test the plugin's error handling capabilities by deliberately triggering errors, such as invalid payment credentials or network timeouts. Verify that error messages are clear, expected and guide users toward resolution steps.
8. Test results: Take note of the findings from your testing, specifically regarding any encountered issues like unexpected behaviors, warnings, errors, deprecated functions, identified bugs and implemented solutions. Maintain comprehensive your test notes for future reference and troubleshooting.

## Versioning

This plugin uses [SemVer](http://semver.org/) for versioning scheme.
To initiate a new version release, navigate to the `gopay-gateway.php` file. Here, update the current plugin version and ensure compatibility with the latest WooCommerce release by adjusting the minimum required and maximum tested versions accordingly. Subsequently, proceed to update the `readme.txt` file with the revised plugin version and provide a summary of the changes in the patch notes section.

### Contribution

- `master` - contains production code. You must not make changes directly to the master!
- `staging` - contains staging code. Pre-production environment for testing.
- `development` - contains development code.

### Contribution process in details

1. Use the development branch for the implementation.
2. Update corresponding readmes after the completion of the development.
3. Create a pull request and properly revise all your changes before merging.
4. Push into the development branch.
5. Upload to staging for testing.
6. When the feature is tested and approved on staging, pull you changes to master.

### Branch consistency across repositories
After implementing all alterations and updating the version, it is necessary to synchronize these updates with the GoPay GitHub repository. Ensure our repository mirrors any supplementary changes made by GoPay. Should there be new changes, perform the synchronization using the provided terminal command:
```sh
$ git push <remote> <source>:<destination>
```
- `remote`: This specifies the remote repository where you want to push your changes. This points to a remote Git repository, often hosted on a GitHub platform. The remote address, which should follow the format `git@github.com:organization/example-repository.git`, can be fetched from SSH GitHub.
- `source`: This represents the local branch you want to push to the remote repository. If you're using "development" as the source, it means you want to push the changes from the local "development" branch to the remote repository.
- `destination`: This denotes the branch in the remote repository where you want to push your changes. Since you're also using "development" as the destination branch, it means you are pushing changes from the local "development" branch to the remote "development" branch.

Upon completing synchronization, proceed to push the changes to the GoPay repository using the same terminal command, making sure to modify the `remote` and specify the `source` and `destination`.

### Add new language

Create a new file inside the languages folder and name it with the plugin's name and locale of the new language (e.g., woocommerce-gopay-it_IT.po for italian). Open the new file with [PoEdit](https://poedit.net), go to the 'translation' tab and click on 'Update from Source Code' to load all phrases to be translated (the phrases must follow [Wordpress internationalization standards](https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/) to be found by [PoEdit](https://poedit.net)). After finding them, PoEdit interface can be used to translate the phrases. Finally, the file must be compiled by going to the 'file' tab and clicking on 'Compile to MO...'. Alternatively, woocommerce-gopay-sample.po can be used to create the translation. First it needs to be renamed to the locale of the new language, then it can be opened in any text editor and for each msgid (orignal phrase) use the msgstr to put the translated phrase. After that, the file must be compiled using any tool for conversion from po to mo format.

### Update an existing language

Open the translation file with [PoEdit](https://poedit.net) and use the interface to update an existing translation. Alternatively, the translation file can be opened on any text editor and for each msgid (orignal phrase) change the msgstr to the new translated phrase. In both alternatives the updated file must be compiled using any tool for po to mo conversion.
