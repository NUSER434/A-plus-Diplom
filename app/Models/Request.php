<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    // Указываем имя таблицы (если оно отличается от названия модели)
    protected $table = 'requests';

    // Разрешаем массовое заполнение полей
    protected $fillable = [
        'user_id', // ID пользователя (если авторизован)
        'first_name', // ФИО или имя
        'email', // Email
        'message', // Сообщение "Что вам нужно?"
        'file_path', // Путь к файлу
    ];

    // Отключаем автоматические временные метки (если они не нужны)
    public $timestamps = true; // По умолчанию true, можно удалить эту строку

    // Связь с пользователем (если user_id указан)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
