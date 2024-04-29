ymaps.ready(init);

function init () {
	var myMap = new ymaps.Map("yndex_map", {
		center: [54.970000,82.925550],
		zoom: 9,
				//controls: [],//без элементов управления
			}, {
				searchControlProvider: 'yandex#search'
			}),
    // Создание макета содержимого хинта.
    // Макет создается через фабрику макетов с помощью текстового шаблона.
    HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
    	"{{ properties.address }}" +
    	"</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                	var el = this.getElement(),
                	result = null;
                	if (el) {
                		var firstChild = el.firstChild;
                		result = new ymaps.shape.Rectangle(
                			new ymaps.geometry.pixel.Rectangle([
                				[0, 0],
                				[firstChild.offsetWidth, firstChild.offsetHeight]
                				])
                			);
                	}
                	return result;
                }
            }
            );


// Поправка

// Поправка



    function Add_point(x, y, adress)
    {
        var myPlacemark = new ymaps.Placemark([x, y], {
        address: adress
        // object: "Центр современного искусства"
        }, {
            hintLayout: HintLayout
        });

        myMap.geoObjects.add(myPlacemark);
        //myPlacemark.hint.open([Number(x), Number(y)]);

        //myPlacemark.balloon.open([55.65,37.7], "Содержимое балуна", { closeButton: true });
    }

    var elements = document.querySelectorAll('.all_coordinates div');
    if(elements.length != 0)
    {
        for (let item of elements)
        {
            let coord_arr = item.querySelector('p').innerHTML.split(',');
            let adress = item.querySelector('span').innerHTML;
            Add_point(coord_arr[0], coord_arr[1], adress);
        }
    }


    myMap.options.set('maxAnimationZoomDifference', Infinity);
    function ZoomToo(x,y)
    {
        myMap.panTo([x, y], {
            delay: 0,
            flying: true
        }).then(function() {
                            // myMap.setZoom(15);
                            myMap.setZoom(15, { 
                              smooth: true,
                              duration: 1000
                          });

        //myMap.setZoom(13,{smooth: true,duration:1000}).then(() => myMap.setZoom(15,{smooth: true,duration:1000}));
        });
    }

    var elements = document.querySelectorAll('.adress_plus_coordinate');
    if(elements.length != 0)
    {
        for (let item of elements)
        {
            let coord_arr = item.querySelector('span').innerHTML.split(',');
            let adress = item.querySelector('p').innerHTML;
            item.addEventListener('click',function(){
                myMap.balloon.close();
                ZoomToo(Number(coord_arr[0]), Number(coord_arr[1]));

                setTimeout(function() {
                    myMap.balloon.open([Number(coord_arr[0]), Number(coord_arr[1])], adress, { closeButton: true });
                }, 1600);
                
            });
            
        }
    }




    //ZoomToo(54.83825,82.900541);

     // myMap.behaviors
     //    // Отключаем часть включенных по умолчанию поведений:
     //    //  - drag - перемещение карты при нажатой левой кнопки мыши;
     //    //  - magnifier.rightButton - увеличение области, выделенной правой кнопкой мыши.
     //    .disable(['scrollZoom']);
 }



