<template>
  <section class="footer rale">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="footer__info">
            <div class="footer-logo">
              <img src="/images/logoFooter.png" alt="mylogo" draggable="false">
            </div>

            <a href="https://www.facebook.com/kurierlink" target="_blank" id="link">
              Follow us on
              <span class="fa fa-facebook-f"></span>acebook
            </a>

            <p>© 2018 Kurier link, Alle Rechte vorbehalten.</p>
          </div>
        </div>
        <!--row-->

        <div class="col-md-2 col-sm-4">
          <div class="footer__company">
            <h4 class="footer__heading">Unternehmen</h4>

            <ul class="company__list">
              <li class="company__list--item">
                <a href="/" class="company__list--link">Home</a>
              </li>
              <li class="company__list--item">
                <a href="/register" class="company__list--link">Registrieren</a>
              </li>
              <li class="company__list--item">
                <a href="/register/aboutUs" class="company__list--link">Über uns</a>
              </li>
              <li class="company__list--item">
                <a href="/service" class="company__list--link">Dienstleistung</a>
              </li>
            </ul>
          </div>
        </div>
        <!--col-->

        <div class="col-md-2 col-sm-4">
          <div class="footer__map">
            <h4 class="footer__heading">Unterstützung</h4>

            <ul class="map__list">
              <li class="map__list--item">
                <a href="/contact" class="map__list--link">Kontakt</a>
              </li>
              <li class="map__list--item">
                <a href="/faq" class="map__list--link">FAQ</a>
              </li>
              <li class="map__list--item">
                <a href="/terms" class="map__list--link">Nutzungsbedingungen</a>
              </li>
              <li class="map__list--item">
                <a href="/terms" class="map__list--link">Datenschutzbestimmungen</a>
              </li>
              <li class="map__list--item">
                <a href="/impressum" class="map__list--link">Impressum</a>
              </li>
            </ul>
          </div>
        </div>
        <!--col-->

        <div class="col-md-5 col-sm-4">
          <div class="footer__subscribe container-fluid">
            <div class="row">
              <div class="social">
                <h4 class="footer__heading">zahlungsarten :</h4>
                <ul
                  class="social__list clearfix"
                  style="display:flex;flex-wrap:wrap;align-items:center;"
                >
                  <li class="social__list--item2">
                    <img src="/images/visa.svg" alt="visa">
                  </li>
                  <li class="social__list--item2">
                    <img src="/images/master.svg" alt="master">
                  </li>
                  <li class="social__list--item2">
                    <img class="custom-margin" src="/images/pay.png" alt="pay">
                  </li>
                  <li class="social__list--item2">
                    <img src="/images/paypal.svg" alt="paypal">
                  </li>
                  <li class="social__list--item2">
                    <img class src="/images/sepa.svg" alt="paypal">
                  </li>
                  <li class="social__list--item2">
                    <img
                      class
                      src="/images/vorkasse.svg"
                      alt="paypal"
                      style="height: 35px;margin-top: 0 !important;"
                    >
                  </li>
                </ul>
              </div>
              <!--social-->
            </div>

            <div class="row">
              <div class="subscribe__form">
                <form action class="sub-form">
                  <input
                    type="email"
                    placeholder="Geben Sie E-Mail ein, um Nachrichten zu erhalten"
                    required
                  >
                  <button class="subscribe-button">
                    <span class="fab fa-telegram-plane"></span>
                  </button>
                </form>
              </div>
              <!--form-->
            </div>
          </div>
        </div>
      </div>
      <!--container-->
    </div>
  </section>
</template>


<script>
export default {
  data() {
    return {};
  }
};
</script>

<style lang="scss" scoped>
/*abstracts*/

/*footer section*/

.footer {
  padding-top: 10px;
  padding-bottom: 10px;
  background: #272727 !important;
  color: #a9a9a9;
  margin: auto 0 0 0;
  min-height: 160px;
  font-size: 14px;
  * {
    font-size: 14px;
  }
  /*footer info*/
  /*footer special*/
  /*footer map*/
  /*footer subscribe*/
}

@media (max-width: 991px) {
  .footer {
    padding-bottom: 50px;
  }
}

.footer__info .footer-logo {
  width: 150px;
  margin-bottom: 25px;
}

.footer__info .footer-logo img {
  max-width: 100%;
}

.footer__info p {
  line-height: 150%;
  font-weight: 600;
  font-size: 16px;
}

.footer__info a#link {
  text-decoration: none !important;
  color: #fff !important;
  margin-bottom: 10px !important;
  display: block !important;
}

.footer__info a:focus,
a:hover {
  text-decoration: none !important;
}

.footer__info a#link span {
  color: #3b5998;
}

@media (max-media: 767px) {
  .footer__company {
    padding-left: 25px;
  }
}

.footer__company .company__list {
  list-style: none;
  padding-left: 0;
}

.footer__company .company__list--item:not(:last-of-type) {
  margin-bottom: 0;
}

.footer__company .company__list--link {
  text-decoration: none;
  color: #a9a9a9;
  transition: all 0.5s ease-in-out;
  font-weight: 600;
  font-size: 14px;
}

.footer__company .company__list--link:hover {
  color: #f6ab36;
}

@media (max-media: 767px) {
  .footer__map {
    padding-left: 25px;
  }
}

.footer__map .map__list {
  list-style: none;
  padding-left: 0;
}

.footer__map .map__list--item:not(:last-of-type) {
  margin-bottom: 0;
}

.footer__map .map__list--link {
  text-decoration: none;
  color: #a9a9a9;
  transition: all 0.5s ease-in-out;
  font-size: 14px;
  font-weight: 600;
}

.footer__map .map__list--link:hover {
  color: #f6ab36;
}

.footer__heading {
  color: #fff;
  font-size: 14px !important;
  letter-spacing: 1px;
  cursor: pointer;
}

.footer__subscribe {
  /*subscribe form*/
}

@media (max-media: 767px) {
  .footer__subscribe {
    padding-left: 25px;
  }
}

.footer__subscribe .social__list {
  padding-left: 0;
  list-style: none;
}

.footer__subscribe .social__list--item {
  float: left;
  cursor: pointer;
}

.footer__subscribe .social__list--item2 img {
  width: 60px;
  float: left;
  margin-right: 15px;
  cursor: pointer;
}

.footer__subscribe .social__list--item2 img:hover {
}

.footer__subscribe .social__list--item2:last-of-type {
  background: #f7f7f8;
}

.footer__subscribe .social__list--item:not(:last-of-type) {
  margin-right: 10px;
}

.footer__subscribe .social__list--link {
  text-decoration: none;
  color: #a9a9a9;
  font-size: 25px;
  transition: all 0.5s ease-in-out;
}

.footer__subscribe .social__list--link:hover {
  color: #f6ab36;
}

.subscribe__form {
  width: 100%;
}

.footer__subscribe .subscribe__form .sub-form {
  background: #1b1b1b;
  border: 1px solid transparent;
  border-radius: 5px;
  position: relative;
  width: 90%;
}

.footer__subscribe .subscribe__form .sub-form input {
  padding: 10px 15px;
  border: none;
  background: transparent;
  width: 80%;
}

.footer__subscribe .subscribe__form .sub-form input:focus {
  outline: none;
}

@media (max-width: 400px) {
  .footer__subscribe .subscribe__form .sub-form input {
    font-size: 16px;
  }
}

.footer__subscribe .subscribe__form .sub-form button {
  position: absolute;
  bottom: -1px;
  top: -1px;
  right: -10px;
  background: #f6ab36;
  border: none;
  width: 25%;
  border-radius: 5px;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
  color: #fff;
  font-size: 20px;
}

/*footer section*/

/*base*/

/*start animation*/

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

/*start animation*/

/*typography*/

html {
  font-size: 60.25%;
}

.lato {
  font-family: "Lato", sans-serif;
}

.rale {
  font-family: "Raleway", sans-serif;
}

/*typography*/

.main-heading {
  font-size: 32px;
  margin-bottom: 25px;
  color: #42474c;
  position: relative;
  margin: auto;
  text-align: center;
  margin-bottom: 50px;
  padding-bottom: 25px;
}

.main-heading::after {
  content: "";
  display: block;
  width: 100px;
  height: 1px;
  background: #afafaf;
  position: absolute;
  left: 50%;
  top: 80%;
  transform: translate(-50%, -50%);
}

.paragraph {
  font-size: 18px;
  line-height: 150%;
  color: #a9a9a9;
}

/*classess*/

.custom-padding {
  padding-left: 15px;
  padding-right: 15px;
}

/*classess*/

.footer__subscribe .subscribe__form .sub-form input::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  font-size: 16px;
}

.footer__subscribe .subscribe__form .sub-form input::-moz-placeholder {
  /* Firefox 19+ */
  font-size: 16px;
}

.footer__subscribe .subscribe__form .sub-form input::-ms-input-placeholder {
  /* IE 10+ */
  font-size: 16px;
}

.footer__subscribe .subscribe__form .sub-form input::-moz-placeholder {
  /* Firefox 18- */
  font-size: 16px;
}

.custom-margin {
  margin-top: 10px;
}

.custom-margin2 {
  margin-top: -10px !important;
  border-radius: 5px !important;
}

.social__list--item2 {
  margin-bottom: 10px;
}
</style>