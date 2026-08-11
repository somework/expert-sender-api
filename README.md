Expert Sender Api
=================

Simple API for expert sender service

## Usage

```php
$expertSender = new ExpertSender('https://api.esv2.com/', $apiKey);

$customProperty = new Property(1775, ExpertSenderEnum::TYPE_STRING, 'female');

$request = new AddUserToList();
$request
    ->setEmail('my@email.com')
    ->setListId(1000)
    ->setFirstName('my name');
    ->addProperty($customProperty)
    ->freeze();

$result = $expertSender->addUserToList($request);

if ($result->isOk()) {
    ...
} else {
    $requestData = $expertSender->getRequestData();
}
```

## Implemented functions

* addUserToList
* deleteUser
* getUserId
* addTableRow
* getTableData
* updateTableRow
* deleteTableRow
* changeEmail
* sendTrigger
* sendTransactional
* sendSystemTransactional
* getLists
* getShortSubscriber


## Maintained by

[Igor Pinchuk](https://github.com/somework) — I work on legacy PHP and Symfony systems:
audits, rescue and refactoring, performance. My open-source packages have been installed
over 70,000 times on Packagist.

Inherited a codebase nobody wants to touch? Written questions get written answers —
no discovery call required.
[i.pinchuk.work@gmail.com](mailto:i.pinchuk.work@gmail.com) ·
[LinkedIn](https://www.linkedin.com/in/kolgarn/)
