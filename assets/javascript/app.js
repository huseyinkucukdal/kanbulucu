var projectRoot = document.location.origin + document.location.pathname;
$(function(){
	
});
////////////////////////////////////////////////////////////// 
// ornek post
////////////////////////////////////////////////////////////// 
/*
var params = {
	job : "server.php deki switch için case...",
	key : "value"
}
$.post('assets/server/server.php', params, function(resp){
	if (resp == 1)
	{
		location.reload();
	}
	else
	{
		alert("HATA : satış gerçekleştirilemedi!");
	}
});
*/

	///////////  kan hizli arama formu   \\\\\\\\\\\\	
var kan_hizli_arama = {
	ilan : {
		save : function(){
			var params = {
				job 		  : "hizliarama",
				il 			  : $('#iller_arama').val(),
				ilce 		  : $('#ilce_arama').val(),
				kangrubu	  : $('#kangrubu').val(),
			};
			if (params.ilce!=null)
			{
				$.post('assets/server/server.php', params, function(resp){
						kan_hizli_arama_ekrana_bas(JSON.parse(resp));
				});
			}
			else
			{
				alert("Lütfen tüm alanları doldurunuz!");
			}
		}
	}
}
function kan_hizli_arama_ekrana_bas(resp)
{
	$('#hizli_arama_sonuclari tr').remove();
	var keys = Object.keys(resp[0]);
	console.log(resp);
	for (var i = 0; i<resp.length; i++)
	{	
		var html = "<tr>";
		for (var ix = 0; ix < keys.length; ix++)
		{
			if (keys[ix] != 'telefongoster')
			{
				html += "<td>";
				html += resp[i][keys[ix]];
				html += "</td>";
			}
			else
			{
				html += "<td>";
				html += (resp[i].telefongoster == 0) ? "<small>Numarası gizli</small>" : resp[i].telefon;
				html += "</td>";
			}
		}
		html += "</tr>";

		console.log(html);
		$('#hizli_arama_sonuclari').append(html);
	}
}

	/////////// kan ilan formu \\\\\\\\\\\\
var kan_ariyorum = {
	ilan : {
		save : function(){
			var params = {
				job 		  : "ilankaydet",
				adsoyad 	  : $('#adsoyad').val(),
				il 			  : $('#iller').val(),
				ilce 		  : $('#ilceler').val(),
				kangrubu	  : $('#kangrubu').val(),
				telefon 	  : $('#telefon').val(),
				eposta  	  : $('#eposta').val(),
				kullanicinotu : $('#kullanicinotu').val()
			};

			var isFormOk = validateForm(params);

			if (isFormOk)
			{
				$.post('assets/server/server.php', params, function(resp){
					if (resp == 0)
					{
						alert("HATA : ilan kaydı gerçekleştirilemedi!");
					}
					else
					{
						window.location.href="?page=kan-ariyorum&subpage=ilan-detay&ilanid="+resp;
					}
				});
			}
			else
			{
				alert("Lütfen tüm alanları doldurunuz!");
			}
		}
	}
}

	/////////// kan bagislama formu \\\\\\\\\\\\
var kan_bagisla = {
	ilan : {
		save : function(){
			var params = {
				job 		  : "bagiskaydet",
				adsoyad 	  : $('#adsoyad').val(),
				il 			  : $('#iller').val(),
				ilce 		  : $('#ilceler').val(),
				kangrubu	  : $('#kangrubu').val(),
				telefon 	  : $('#telefon').val(),
				eposta  	  : $('#eposta').val(),
				sifre		  : $('#sifre').val(),
				sifreTekrar   : $('#sifreTekrar').val(),
				tgoster		  : (document.getElementById("telefonugoster").checked)?"1":"0",
			};

			//var isFormOk = validateForm(params);
			isFormOk = true;
			if (isFormOk)
			{
				if (params.sifre == params.sifreTekrar){








					$.post('assets/server/server.php', params, function(resp){
						if (resp == 0)
						{
							alert("HATA : ilan kaydı gerçekleştirilemedi!");
						}
						else if (resp == 2)
						{
							alert("Bu email adresi daha once asldknaskjdn");
						}
						else
						{
							window.location.href="?page=kan-bagisla&subpage=profil&profilid="+resp;
						}
					});
				}
				else
				{
					alert("sifre eslesmelidir");
				}
			}
			else
			{
				alert("Lütfen tüm alanları doldurunuz!");
			}
		}
	}
}
// login formu
var login_form = {
	login : function(){
		var params = {
			job     : "login",
			eposta  : $('#login_email').val(), 
			sifre   : $('#login_sifre').val()  
		};
		console.log();
		if (params.eposta!="" || params.sifre!="")
		{
			$.post('assets/server/server.php',params,function(resp){
				var donor = JSON.parse(resp);
				console.log(donor.adsoyad);
				if (donor.adsoyad==null)
				{
					alert("Şifre veya Eposta yanlış");
				}
				else
				{
					alert("hosgeldin "+donor.adsoyad);
				}
			});
		}
	}
}
// formlar dolumu kontrol et
function validateForm(params)
{
	var isFilled = true;
	if (Object.keys(params).length > 0)
	{
		var lngt = Object.keys(params).length;
	}
	else
	{
		return false;
	}
	for (var i = 0; i < lngt; i++)
	{
//		console.log(params[Object.keys(params)[i]]);
		if (params[Object.keys(params)[i]] == "" || params[Object.keys(params)[i]] == null)
		{			
			return false;
		}
	}
	return (isFilled) ? true : false;
}
// illere gore ilceleri getir
function ileGoreIlceleriGetir(ilcelerSelectId,ilselected){
	var params = 
	{
		job 	: "ileGoreIlceleriGetir",
		il_id	: $('#'+ilselected+'').val()
	}

	$.post('assets/server/server.php', params, function(resp){
		setSelectOptions(JSON.parse(resp), ilcelerSelectId);
	});
}

function setSelectOptions(data, inputId)
{
	var toplam = data.length;
	$('#'+inputId+" option").remove();
	for(var i =0; i<toplam; i++)
	{
		var html  = "<option value='"+data[i].id+"'>";
			html += data[i].baslik;
			html += "</option>";

		$("#"+inputId).append(html);
	}
}
/////////////////////////////////////////////////////////////
// ilimdeki donorler ajax
function ilimdeki_donorler( ilid )
{
	var params = 
	{
		job 	: "uygunIleGoreDonorler",
		il_id	: ilid
	}

	$.post('assets/server/server.php', params, function(resp){
		uygunIlanlariBas(JSON.parse(resp),'ilce');
	});
}
// ilimdeki donorleri ekrana bas
function uygunIlanlariBas(resp)
{
	$('#illereGoreDonorAlani tr').remove();
	var keys = Object.keys(resp[0]);
	for (var i = 0; i<resp.length; i++)
	{	
		var html = "<tr>";
		for (var ix = 0; ix < keys.length; ix++)
		{
			if (keys[ix] != 'telefongoster')
			{
				html += "<td>";
				html += resp[i][keys[ix]];
				html += "</td>";
			}
			else
			{
				html += "<td>";
				html += (resp[i].telefongoster == 0) ? "<small>Numarası gizli</small>" : resp[i].telefon;
				html += "</td>";
			}
		}
		html += "</tr>";
		$('#illereGoreDonorAlani').append(html);
	}
}
///////////////////////////////////////////////////////////
// kan arama ilani formunu etkinlestir
function ilan_formu_etkinlestir()
{
	$('.ilan_kayit_formu').show();
	$('.ilan_hizli_arama').hide();
	$('#hizli_arama_sonuclari').hide();
}






