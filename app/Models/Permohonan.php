<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    // Tetapkan nama table yang perlu dihubungi
    // jika nama table tak guna plural
    protected $table = 'permohonan';

    protected $fillable = [
        'pegawai_pemohon_id',
        'pegawai_bertanggungjawab_id',
        'tarikh_jangka_pinjam',
        'tarikh_jangka_pulang',
        'tujuan_permohonan',
        'lokasi_tujuan',
        'status'
    ];


    // Senarai Status
    public const STATUS_DRAF = 'DRAF';
    public const STATUS_BARU = 'BARU';
    public const STATUS_DALAM_PROSES = 'DALAM PROSES';
    public const STATUS_LULUS = 'LULUS';
    public const STATUS_TIDAK_LULUS = 'TIDAK LULUS';
    public const STATUS_BATAL = 'BATAL';
    public const STATUS_SEDIA_UNTUK_DIAMBIL = 'SEDIA UNTUK DIAMBIL';
    public const STATUS_SELESAI = 'SELESAI';
    public const STATUS_DALAM_PINJAMAN = 'DALAM PINJAMAN';

    // Method untuk paparkan dropdown
    public static function listStatus() {
        return [
            self::STATUS_DRAF => self::STATUS_DRAF,
            self::STATUS_BARU => self::STATUS_BARU,
            self::STATUS_DALAM_PROSES => self::STATUS_DALAM_PROSES,
            self::STATUS_LULUS => self::STATUS_LULUS,
            self::STATUS_TIDAK_LULUS => self::STATUS_TIDAK_LULUS,
            self::STATUS_BATAL => self::STATUS_BATAL,
            self::STATUS_SEDIA_UNTUK_DIAMBIL => self::STATUS_SEDIA_UNTUK_DIAMBIL,
            self::STATUS_SELESAI => self::STATUS_SELESAI,
            self::STATUS_DALAM_PINJAMAN => self::STATUS_DALAM_PINJAMAN,
        ];
    }


}

