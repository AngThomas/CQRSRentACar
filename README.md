# CQRSRentACar [WIP]

Simple CQRS app based on `Symfony 7` and `PHP 8.3`

Projest make use of `Enums`, `CustomRequests` (thanks to `#MapRequestPayload` it is now a pleasure to use them), `Value objects`, `DTOs`, `Mappers`

For now only routes from `TestController.php` are available (its methods may have some excess logic):

`/test/renting-agent/add` - allows to add new `RentingAgent` (required when adding new `CarOffer`)

`/test/car-offer/add`  - allows to add new `CarOffer`

`test/car-offer/show` - allows to list all `CarOffers`
