<main class="bg-transparent">
    <!-- banner section -->
    <section>
      <!-- banner section -->
      <div
        class="bg-lightGrey10 dark:bg-lightGrey10-dark relative z-0 overflow-y-visible py-50px md:py-20 lg:py-100px 2xl:pb-150px 2xl:pt-40.5"
      >
        <!-- animated icons -->
        <div>
          <img
            class="absolute left-0 bottom-0 md:left-[14px] lg:left-[50px] lg:bottom-[21px] 2xl:left-[165px] 2xl:bottom-[60px] animate-move-var z-10"
            src="../../assets/images/herobanner/herobanner__1.png"
            alt=""
          ><img
            class="absolute left-0 top-0 lg:left-[50px] lg:top-[100px] animate-spin-slow"
            src="../../assets/images/herobanner/herobanner__2.png"
            alt=""
          ><img
            class="absolute right-[30px] top-0 md:right-10 lg:right-[575px] 2xl:top-20 animate-move-var2 opacity-50 hidden md:block"
            src="../../assets/images/herobanner/herobanner__3.png"
            alt=""
          >

          <img
            class="absolute right-[30px] top-[212px] md:right-10 md:top-[157px] lg:right-[45px] lg:top-[100px] animate-move-hor"
            src="../../assets/images/herobanner/herobanner__5.png"
            alt=""
          >
        </div>
        <div class="container">
          <div class="text-center">
            <h1
              class="text-3xl md:text-size-40 2xl:text-size-55 font-bold text-blackColor dark:text-blackColor-dark mb-7 md:mb-6 pt-3"
            >
              Cart
            </h1>
            <ul class="flex gap-1 justify-center">
              <li>
                <a
                  href="../../index.html"
                  class="text-lg text-blackColor2 dark:text-blackColor2-dark"
                  >Home <i class="icofont-simple-right"></i
                ></a>
              </li>
              <li>
                <span
                  class="text-lg text-blackColor2 dark:text-blackColor2-dark"
                  >Cart</span
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- cart section -->
    <section>
      <div class="container py-50px lg:py-60px 2xl:py-20 3xl:py-100px">
        <!-- cert table -->
        <div
          class="text-contentColor dark:text-contentColor-dark text-size-10 md:text-base overflow-auto"
        >
          <table
            class="table-fixed md:table-auto leading-1.8 text-center w-150 md:w-full overflow-auto border border-borderColor dark:border-borderColor-dark box-content md:box-border"
          >
            <thead>
              <tr
                class="md:text-sm text-blackColor dark:text-blackColor-dark uppercase font-medium border-b border-borderColor dark:border-borderColor-dark"
              >
                <th
                  class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap"
                >
                  Image
                </th>
                <th
                  class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap"
                >
                  Product
                </th>
                <th
                  class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap"
                >
                  Price
                </th>
                <th
                  class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap"
                >
                  Quantity
                </th>
                <th
                  class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap"
                >
                  Total
                </th>
                <th
                  class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap"
                >
                  Remove
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="border-b border-borderColor dark:border-borderColor-dark"
              >
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark"
                >
                  <a href="#">
                    <img
                      loading="lazy"
                      src="../../assets/images/products/2.jpg"
                      alt="product-1"
                      class="max-w-20 w-full"
                    >
                  </a>
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark w-300px"
                >
                  <a
                    class="hover:text-primaryColor"
                    href="product-details.html"
                    >Product title acc 10 - s / red</a
                  >
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark"
                >
                  <span class="amount">$110.00</span>
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark w-300px"
                >
                  <div
                    class="count-container max-w-150px h-55px leading-55px border-2 border-borderColor2 dark:border-borderColor2-dark relative overflow-hidden inline-block"
                  >
                    <input
                      type="number"
                      value="1"
                      class="w-full rounded-full focus:outline-none bg-transparent text-center"
                    >
                    <div>
                      <button
                        class="mincount absolute left-[10px] top-1/2 -translate-y-1/2 text-blackColor dark:text-blackColor-dark p-x-10px leading-1.8 w-5 inline-block opacity-50"
                      >
                        -</button
                      ><button
                        class="maxcount absolute top-1/2 -translate-y-1/2 right-[10px] text-blackColor dark:text-blackColor-dark p-x-10px leading-1.8 w-5 inline-block"
                      >
                        +
                      </button>
                    </div>
                  </div>
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark"
                >
                  $110.00
                </td>
                <td class="py-15px md:py-5">
                  <a href="#">
                    <svg
                      width="25"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4 ionicon"
                      viewBox="0 0 512 512"
                     
                    >
                      <title>Pencil</title>
                      <path
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="32"
                        d="M364.13 125.25L87 403l-23 45 44.99-23 277.76-277.13-22.62-22.62zM420.69 68.69l-22.62 22.62 22.62 22.63 22.62-22.63a16 16 0 000-22.62h0a16 16 0 00-22.62 0z"
                      ></path></svg
                  ></a>
                  <a href="#">
                    <svg
                      width="25"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4 ionicon"
                      viewBox="0 0 512 512"
                     
                    >
                      <title>Trash</title>
                      <path
                        d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="32"
                      ></path>
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-miterlimit="10"
                        stroke-width="32"
                        d="M80 112h352"
                      ></path>
                      <path
                        d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="32"
                      ></path></svg
                  ></a>
                </td>
              </tr>
              <tr
                class="border-b border-borderColor dark:border-borderColor-dark"
              >
                <td
                  class="py-15px md:py-5 border-r border-b border-borderColor dark:border-borderColor-dark"
                >
                  <a href="#">
                    <img
                      loading="lazy"
                      src="../../assets/images/products/1.jpg"
                      alt="product-1"
                      class="max-w-20 w-full"
                    >
                  </a>
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark w-300px"
                >
                  <a
                    class="hover:text-primaryColor"
                    href="product-details.html"
                    >Product title acc 10 - s / red</a
                  >
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark"
                >
                  <span class="amount">$110.00</span>
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark w-300px"
                >
                  <div
                    class="count-container max-w-150px h-55px leading-55px border-2 border-borderColor2 dark:border-borderColor2-dark relative overflow-hidden inline-block"
                  >
                    <input
                      type="number"
                      value="1"
                      class="w-full rounded-full focus:outline-none bg-transparent text-center"
                    >
                    <div>
                      <button
                        class="mincount absolute left-[10px] top-1/2 -translate-y-1/2 text-blackColor dark:text-blackColor-dark p-x-10px leading-1.8 w-5 inline-block opacity-50"
                      >
                        -</button
                      ><button
                        class="maxcount absolute top-1/2 -translate-y-1/2 right-[10px] text-blackColor dark:text-blackColor-dark p-x-10px leading-1.8 w-5 inline-block"
                      >
                        +
                      </button>
                    </div>
                  </div>
                </td>
                <td
                  class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark"
                >
                  $110.00
                </td>
                <td class="py-15px md:py-5">
                  <a href="#">
                    <svg
                      width="25"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4 ionicon"
                      viewBox="0 0 512 512"
                     
                    >
                      <title>Pencil</title>
                      <path
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="32"
                        d="M364.13 125.25L87 403l-23 45 44.99-23 277.76-277.13-22.62-22.62zM420.69 68.69l-22.62 22.62 22.62 22.63 22.62-22.63a16 16 0 000-22.62h0a16 16 0 00-22.62 0z"
                      ></path></svg
                  ></a>
                  <a href="#">
                    <svg
                      width="25"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4 ionicon"
                      viewBox="0 0 512 512"
                     
                    >
                      <title>Trash</title>
                      <path
                        d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="32"
                      ></path>
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-miterlimit="10"
                        stroke-width="32"
                        d="M80 112h352"
                      ></path>
                      <path
                        d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="32"
                      ></path></svg
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- cart action buttons -->
        <div
          class="flex flex-wrap sm:flex-nowrap justify-between items-center gap-x-5 gap-y-10px pt-22px pb-9 md:pt-30px md:pb-55px"
        >
          <div>
            <button
              class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 px-5 py-18px md:px-10 bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor"
            >
              CONTINUE SHOPPING
            </button>
          </div>
          <div
            class="flex flex-wrap sm:flex-nowrap justify-between items-center gap-x-5 gap-y-10px"
          >
            <button
              class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 px-5 py-18px md:px-10 bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor"
            >
              UPDATE CART
            </button>
            <button
              class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 px-5 py-18px md:px-10 bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor"
            >
              CLEAR CART
            </button>
          </div>
        </div>

        <!-- cart input -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-30px">
          <div>
            <div
              class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px"
            >
              <!-- heading -->
              <div class="flex gap-x-4">
                <h3
                  class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-22px"
                >
                  <span class="leading-1.2">Estimate Shipping And Tax</span>
                </h3>
                <div
                  class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"
                ></div>
              </div>
              <p
                class="text-contentColor dark:text-contentColor-dark mb-15px"
              >
                Enter your destination to get a shipping estimate.
              </p>
              <!-- form -->
              <form>
                <div class="mb-5">
                  <label class="text-blackColor dark:text-blackColor-dark"
                    >* Country</label
                  >
                  <select
                   
                    
                    class="text-xs text-blackColor py-9px px-15px w-full rounded box-border border border-blackColor dark:border-blackColor-dark"
                  >
                    <option value="USA" selected="">USA</option>
                    <option value=" UK">UK</option>
                    <option value="Canada">Canada</option>
                    <option value="Russia">Russia</option>
                    <option value="price-ascending">China</option>
                  </select>
                </div>
                <div class="mb-5">
                  <label
                    class="text-blackColor dark:text-blackColor-dark"
                    for="zip"
                    >* Zip/Postal Code</label
                  >
                  <input
                    type="text"
                    placeholder="Zip/Postal Code"
                    id="zip"
                    class="text-xs text-blackColor py-11px px-15px w-full rounded box-border border border-borderColor dark:border-borderColor-dark focus:outline-none placeholder:text-placeholder placeholder:opacity-55"
                  >
                </div>
                <div>
                  <a
                    href="create-course.html"
                    class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor rounded group text-nowrap"
                  >
                    Calculate shipping
                  </a>
                </div>
              </form>
            </div>
          </div>
          <div>
            <div
              class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px"
            >
              <!-- heading -->
              <div class="flex gap-x-4">
                <h3
                  class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-22px"
                >
                  <span class="leading-1.2">Cart Note</span>
                </h3>
                <div
                  class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"
                ></div>
              </div>
              <p
                class="text-contentColor dark:text-contentColor-dark mb-15px"
              >
                Special instructions for seller
              </p>
              <!-- form -->
              <form>
                <div class="mb-5">
                  <textarea
                    class="text-xs text-blackColor py-11px px-15px w-full rounded box-border border border-borderColor2 dark:border-borderColor2-dark"
                    cols="30"
                    rows="4"
                  ></textarea>
                </div>
              </form>
            </div>
          </div>
          <div>
            <div
              class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px"
            >
              <!-- heading -->
              <div class="flex gap-x-4">
                <h3
                  class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-9"
                >
                  <span class="leading-1.2">Cart Total</span>
                </h3>
                <div
                  class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"
                ></div>
              </div>
              <h4
                class="text-sm font-bold text-blackColor dark:text-blackColor-dark mb-5 flex justify-between items-center"
              >
                <span class="leading-1.2">Cart Totals</span>
                <span class="leading-1.2 text-lg font-medium">$189.00</span>
              </h4>
              <div>
                <button
                  class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 w-full px-10px py-18px bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor"
                >
                  PROCEED TO CHECKOUT
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>