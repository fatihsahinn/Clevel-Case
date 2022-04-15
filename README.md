## Projem hakkında

Projeyi çalıştırmak için dosyaları zip halinde indirip xampp vb. gibi programlar yardımıyla ilgili dizine yükleyip ardından terminal'den php artisan serve yazmanız yeterli olacaktır.

- Database için .env dosyasından ayarlarınızı yaptıktan sonra php artisan migrate komutunu kullanabilirsiniz.
- Yeni bir not eklemek için seeder kodu: php artisan db:seed --class=NoteSeeder kodunu kullanabilirsiniz. Sizin için random bir not ekleyecektir.
- Postman'daki collectionu görmek için [bu linki](https://go.postman.co/workspace/My-Workspace~7fdfc66d-d36e-40ae-89f5-82c6fe60c9df/collection/20507867-ebfd4048-d450-4b0f-9419-b7e94210cbb9?action=share&creator=20507867) kullanabilirsiniz.

Projede bulunan api rotaları;

- GET: /notes -> Tüm notları gösterir. 
- GET: /notes/{note} -> İd'ya bağlı olarak not gösterir.
- POST: /notes -> Yeni bir not ekletir.
- GET: /notes/{note}/edit -> Notu düzenletir. Örneğin; ( /notes/3/edit?name=X )
- PUT: /notes/{note} -> Var ise notu düzenler yok ise ekler.
- DELETE: /notes/{note} -> Notu siler.

## Proje klasör yapısı

- App/Http/Abstracts/DBAbstract.php -> Abstract class'ı bulunur.
- App/Http/Abstracts/DBFunction.php -> DB için hazır kalıpta fonksiyonlar bulunur.
- App/Http/Controllers/Controller.php -> Projenin tek kontrol dosyası.
- App/Http/Resources/NoteResource.php -> Datayı resource üzerinden gösterir.
- App/Http/Services/ClassService.php -> Controllerden sonra gelen yönlendirme klası.
- App/Http/Models/NoteModel.php -> Abstract ve uygulama arasındaki köprü.

## Projenin geliştirilme amacı

Kodlara hızlı bir şekilde erişip ve kodu hızlı bir şekilde yayınlamak. Daha sonradan üzerinde yapılabilecek değişikliklerin hızlı şekilde yapılabilmesi.

### Kullanılanlar

- **Response**
- **Carbon**
- **Str**
- **Resource**
- **Mysql**

## Proje gereksinimleri

- **Php 8.0 ve üstü**
- **Mariadb**
