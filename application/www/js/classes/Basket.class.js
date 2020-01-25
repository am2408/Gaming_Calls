class Basket {

  constructor() {
    this.items = this.loadBasket();
    console.log(this.items);
    this.displayBasket();

  }

  displayBasket() {
    if(this.items.length > 0) {
      $('#itemBasket').removeClass('hide');
      $('#itemBasket').text(this.items.length);
    } else {
      $('#itemBasket').addClass('hide');
      $('#itemBasket').text('');
    }
  }


  addBasket(id, name, quantity, price) {

    id = parseInt(id);
    quantity = parseInt(quantity);


    let item = {
      id: id,
      name: name,
      quantity: quantity,
      price: price
    }

    for(let i = 0; i < this.items.length; i++)
    {
      if(this.items[i].id == id)
      {
        this.items[i].quantity += quantity

        this.saveBasket();

        return true;
      }
    }

    this.items.push(item);
    this.saveBasket();

  }

  // addPlan(price) {
    //
    //
    //   let item = {
      //     price: price
      //   }
      //
      //   this.items.push(item);
      //   this.saveBasket();
      //
      // }

      loadBasket() {

        let items = loadDataFromDomStorage('gamingBasket');

        if (items == null) {
          items = [];
        }

        return items;
      }

      saveBasket() {

        saveDataToDomStorage('gamingBasket', this.items);
        this.displayBasket();
        this.displayBasketAll();
      }

      displayBasketAll() {

        let totalPrice= 0;
        if(this.items.length > 0) {

          $('#displayBasket table tbody').empty();

          for (let i = 0; i < this.items.length; i++) {
            totalPrice += parseFloat(this.items[i].quantity)*parseFloat(this.items[i].price);
            var tr = $('<tr>');
            tr.append('<td>'+this.items[i].quantity+'</td><td>'+this.items[i].name+'</td><td>'+(parseFloat(this.items[i].quantity)*parseFloat(this.items[i].price)) +' €</td><td></td><td><button class="trash" data-index="'+i+'"><i class="fas fa-trash-alt"></i></button></td>')
            $('#displayBasket table tbody').append(tr);
            $('#totalPrice').text(totalPrice);


          }
        }else {

          $('#displayBasket').html('<p>Votre panier est vide...</p>');
          $('.p-form').css('display', 'none');
        }
      }

      removeBasket(id) {
        this.items.splice(id, 1);
        this.saveBasket();
      }

      clearBasket() {
        this.items = [];
        this.saveBasket();
      }

      loadBasketInput(thing) {
        $(thing).val(JSON.stringify(this.items));
      }


    }
