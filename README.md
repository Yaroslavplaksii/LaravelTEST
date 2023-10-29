# LaravelTEST
Документація http://127.0.0.1:8000/api/documentation#/ (якщо запустити локально)
###
###
CRUD для постів контролер PostController
###
###
Authentication і authorization директорія Controllers/Auth (не використовувалося готове рішення)
###
###
Policies/gates/middleware в роутах, а токож для update і remove в постах
###
###
Черги реалізував для розсилки на email. Для цього створив таблицю в БД, додав фабрику і згенерив 100 emails/ Контролер EmailController.
###
###
Зовнішній АПІ взяв тут api-football-v1.p.rapidapi.com, контролер InfoController, з відповідним сервісом
###
###
Cache реалізував в коннтролері InfoController при спробі взяти дані, якщо їх немає то дивимося в кеш, а інакше на зовнішній АПІ.
######
Для зовнішні запитів викосристав guzzlehttp
Для токен взяв sanctum
Деякі контролери зробив як invoke
