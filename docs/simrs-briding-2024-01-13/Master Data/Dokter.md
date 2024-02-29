## 1. Untuk mengambil data dokter  menggunakan query dibawah ini

#### Fungsi : untuk menampilkan di select option

```sql
SELECT 
	KODE_DOKTER AS kode_dokter,
	NAMA_DOKTER As nama_dokter
FROM
	DB_RSMM.dbo.DOKTER
WHERE 
	JENIS_PROFESI = 'DOKTER UMUM' OR JENIS_PROFESI = 'DOKTER SPESIALIS' OR Spesialis =      'FISIOTERAPI' and KODE_DOKTER NOT IN('140s','TM140')
ORDER BY 
	NAMA_DOKTER ASC;
```

## 2. Menampilkan data Dokter 

#### Fungsi : melihat data Dokter

```sql
SELECT 
	Kode_Dokter AS kode_dokter,
	Jenis_Profesi AS jenis_profesi,
	Spesialis AS spesialis,
	Nama_Dokter AS nama_dokter,
	Jenis_Kelamin AS jenis_kelamin,
	Tgl_Lahir AS tgl_lahir,
	Agama AS agama,
	Email AS email,
	No_KTP AS nik,
	Alamat AS alamat,
	Kota AS kota,
	Provinsi AS provinsi,
	Kode_Pos AS kode_pos,
	COALESCE(NULLIF(HP1, ''), Telp_Rumah) AS no_hp,
	Pemeriksaan AS pemeriksaan,
	Visite AS visit,
	Konsul AS konsul,
	Tindakan AS tindakan,
	Lain AS lain
FROM
	DB_RSMM.dbo.DOKTER
WHERE
	Nama_Dokter != '-' AND
	Jenis_Profesi LIKE '%dokter%'
ORDER BY 
	Kode_Dokter ASC;
```








