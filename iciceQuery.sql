SELECT 
	aa_siparis_no,
	aa_siparis_tarihi,
	aa_musteri,
	aa_urun_adet,
	aa_muhtemel_uretim_tarih,
	aa_uretilen_tarih,
	aa_teslim_montaj_ihracat_tarih,
	aa_teslim_sekli,
	aa_ozel_not,
	aa_islem_tarihi,
	updated_at 
	FROM siparis 
	WHERE id 
	IN
		(SELECT kullanici_bilgileri_table_id 
				FROM kullanici_bilgileri )