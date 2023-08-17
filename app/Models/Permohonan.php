<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permohonan extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Tetapkan nama table yang perlu dihubungi
    // jika nama table tak guna plural
    protected $table = 'permohonan';

    // Untuk protection mass assigment
    // Iaitu data - data yang boleh disimpan menerusi method Model::create()
    protected $fillable = [
        'pegawai_pemohon_id',
        'pegawai_bertanggungjawab_id',
        'tarikh_jangka_pinjam',
        'tarikh_jangka_pulang',
        'tujuan_permohonan',
        'lokasi_tujuan',
        'pengawai_pengesah_id',
        'tarikh_pengesahan',
        'pengawai_pengeluar_id',
        'tarikh_pengeluaran',
        'pengawai_pengambil_id',
        'tarikh_ambil',
        'pengawai_pemulang_id',
        'tarikh_pulangan',
        'pengawai_penerima_pulangan_id',
        'tarikh_terima_pulangan',
        'catatan_pegawai_penerima',
        'ticket',
        'fail_sokongan',
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
    public const STATUS_DIPULANGKAN = 'DIPULANGKAN';
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
            self::STATUS_DIPULANGKAN => self::STATUS_DIPULANGKAN,
            self::STATUS_SELESAI => self::STATUS_SELESAI,
            self::STATUS_DALAM_PINJAMAN => self::STATUS_DALAM_PINJAMAN,
        ];
    }

    public function pegawaiPemohon()
    {
        return $this->belongsTo(User::class, 'pegawai_pemohon_id', 'id');
    }

    public function pegawaiBertanggungjawab()
    {
        return $this->belongsTo(User::class, 'pegawai_bertanggungjawab_id', 'id');
    }

}

