# Электронная библиотека.

Реализован следующий функционал:

вывод книг/читателей с возможностью удаления (если книга на руках удаление книги/читателя невозможно) и перехода в карточку книги/читателя;
добавление книги/читателя с восстановлением ранее удаленных и проверкой на дубликаты;
нахождение книги/читателя с возможностью удаления (если книга на руках удаление книги/читателя невозможно) и перехода в карточку книги/читателя;
выдача книги с изменением кол-ва свободных книг;
вывод всех выдач книг с возможностью вернуть пока не возвращенные;
вывод карточки книги/читателя с возможностью поменять данные книги/читателя (но не создать так дубликат другой существующей записи) и удалить книгу/читателя (если нет выданных книг);
Кроме этого реализованы следующие проверки:

в инпут тип текст нельзя ввести пробел или отправить без данных;
в инпут тип число можно ввести целое положительное число или ноль;
если колво книги ноль, для выбора на выдачу она будет не доступна;
все сравнения данных из базы с данными от клиента регистронезависимы и с убранными пробелами вконце и начале.
