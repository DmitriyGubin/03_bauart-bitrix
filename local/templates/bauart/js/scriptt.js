window.addEventListener("load",function(){

	document.querySelector('#show_menu').addEventListener("click", () => ShowMenu('#left_menu_main','.right_area'));
	document.querySelector('#hide_menu').addEventListener("click", () => HideMenu('#left_menu_main','.right_area'));
	document.querySelector('.burger_menu').addEventListener("click", HideScroll);

	document.querySelector('.submenu_one').addEventListener("mouseover", () => ShowSubMenu('.scroll_submenu_ready'));
	document.querySelector('.submenu_one').addEventListener("mouseout", () => HideSubMenu('.scroll_submenu_ready'));
	document.querySelector('.submenu_three').addEventListener("mouseover", () => ShowSubMenu('.scroll_submenu_about_company'));
	document.querySelector('.submenu_three').addEventListener("mouseout", () => HideSubMenu('.scroll_submenu_about_company'));

	document.querySelector('#close').addEventListener("click", Hide_PopUp_Order);

	Button_event_handler_house_list();
	Button_event_handler_ipoteka_list();
	Button_event_handler_all_pop_up();

	Scroll_to_element();

	Sumbit_without_button();

	//console.log(screen.width);
});

function Sumbit_without_button()
{
	var forma = document.querySelectorAll('.universal_form');
	
	if(forma.length != 0)
	{
		document.querySelector('.universal_form').addEventListener("change", func);
		function func()
		{
			document.querySelector('.drop_form').click();
			document.querySelector('.submit_form').click();
		}
	}
}

var standart_scroll = true;/*небольшой лайф хак*/

function HideScroll()
{
	standart_scroll = false;/*запрет на стандартный скрол*/
	window.scrollBy(0, -1000000);
	ShowMenu('#left_menu_main','.right_area');

	setTimeout(function() {
		standart_scroll = true;
	}, 100);
}

function ShowMenu(left,right)
{
	if(document.querySelector(left).classList.contains('deactive_menu'))
	{
		document.querySelector(left).classList.remove('deactive_menu');
	}

	document.querySelector(right).classList.add('hide');
	document.querySelector(left).classList.add('show');
}

function HideMenu(left,right)
{
	document.querySelector(left).classList.add('deactive_menu');

	setTimeout(function() {
		document.querySelector(left).classList.remove('show');
		document.querySelector(right).classList.remove('hide');
	}, 300);
}

function ShowSubMenu(menu_type)
{
	// var screen_pos = window.pageYOffset;
	// var scroll_limit = document.querySelector('#main_head').offsetHeight;
	// elem = document.querySelector(menu_type);
	
	// if((!elem.classList.contains('show_sub_menu')) && (screen_pos > scroll_limit))
	// {
	// 	elem.classList.add('show_sub_menu');
	// }


	elem = document.querySelector(menu_type);
	if(!elem.classList.contains('show_sub_menu') && 
		document.querySelector('#left_menu_main').classList.contains('modify_scroll'))
	{
		elem.classList.add('show_sub_menu');
	}
}

function HideSubMenu(menu_type)
{
	elem = document.querySelector(menu_type);
	if(elem.classList.contains('show_sub_menu'))
	{
		elem.classList.remove('show_sub_menu');
	}
}

//window.addEventListener('scroll', Scroll);

function Scroll()
{
	var screen_pos = window.pageYOffset;
	
	var elem_left = document.querySelector('.left_menu');
	var elem_right = document.querySelector('.right_area');
	
	if (screen_pos > document.querySelector('#main_head').offsetHeight)
	{
		elem_left.classList.add('modify_scroll');
		elem_right.classList.add('modify_scroll_right');
	}
	else
	{
		if(elem_left.classList.contains('modify_scroll'))
		{
			elem_left.classList.remove('modify_scroll');
			if(screen.width > 750 && standart_scroll != false)
			{
				window.scrollBy(0, document.querySelector('#main_head').offsetHeight - 10);
			}
		}

		if(elem_right.classList.contains('modify_scroll_right'))
		{
			elem_right.classList.remove('modify_scroll_right');
			if(screen.width <= 750 && standart_scroll != false)
			{
				window.scrollBy(0, document.querySelector('#main_head').offsetHeight - 10);
			}
		}
	}
}

function Show_PopUp_Order()
{
	document.querySelector('.send_order').classList.add('show_pop_up_order');
}

function Hide_PopUp_Order()
{
	document.querySelector('.send_order').classList.remove('show_pop_up_order');

	document.querySelector('#form-content').classList.remove('hide');
	document.querySelector('#succes_order').classList.remove('show');
}

function Button_event_handler_house_list()
{
	var elements = document.querySelectorAll('.house_block');
	if(elements.length != 0)
	{
		for (let item of elements)
		{
			let house_namee = item.querySelector('.house_name').innerHTML;
			let house_pricee = item.querySelector('.house_price').innerHTML;

			//console.log(house_namee, house_pricee);

			item.querySelector('.button_list').addEventListener('click',function(){

				//console.log(house_namee, house_pricee);
				document.querySelector('#house-name').value = house_namee;
				document.querySelector('#house-price').value = house_pricee;
            	Show_PopUp_Order();
        	});
		}
	}
}

function Button_event_handler_ipoteka_list()
{
	var elements = document.querySelectorAll('.ipoteka_block');
	if(elements.length != 0)
	{
		for (let item of elements)
		{
			item.querySelector('.button_list').addEventListener('click',function(){
            	Show_PopUp_Order();
        	});
		}
	}
}

function Button_event_handler_all_pop_up()
{
	var elements = document.querySelectorAll('.pop_up_order');
	if(elements.length != 0)
	{
		for (let item of elements)
		{
			item.addEventListener('click',function(){
            	Show_PopUp_Order();
        	});
		}
	}
}

function Scroll_to_element()
{
	const smoothLinks = document.querySelectorAll('.scroll_menuu a');
	for (let smoothLink of smoothLinks) 
	{
	    smoothLink.addEventListener('click', function (e) 
	    {
	        e.preventDefault();
	        const id = smoothLink.getAttribute('href');

	        document.querySelector(id).scrollIntoView({
	            behavior: 'smooth',
	            block: 'start'
	        });
	    });
	};
}




