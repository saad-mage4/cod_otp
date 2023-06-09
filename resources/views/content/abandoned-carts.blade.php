  <div class="content">

   {{-- WhatsApp Configuration  --}}
   <div class="grid-box">
                    <div class="box left">
                        <div class="text">
                            <h2>WhatsApp Configuration</h2>
                            <p>
                               Message Language (all messages will be sent in this language)
                            </p>
                        </div>
                    </div>
                    <div class="box right">
                        <div class="item">
                            <div >
                              <input type="radio" id="html" name="radio" value="English">
                               <label for="html">English</label>
                                <input type="radio" id="html" name="radio" value="German">
                               <label for="html">German</label>
                            </div>
                        </div>
                    </div>
                </div>
   {{-- WhatsApp Configuration End  --}}

   {{-- Abandoned Recovery Message --}}
   <div class="grid-box">
            <div class="box left">
                <div class="text">
                    <h2>Abandoned Recovery Message</h2>
                    <p>
                       Recover abandoned carts by reaching your customers on WhatsApp.
                    </p>
                    <p>Automated WhatsApp message templates cannot be modified or edited, because message templates need to be pre-approved by WhatsApp before they can be sent using the API.</p>
                </div>
            </div>
            <div class="box right">
                <div class="item">
                   <label for="enb-dis">Status</label>

                            <select
                                name="app_status"
                            >
                                <option value="Disable">Disable</option>
                                <option value="Enable">Enable</option>
                            </select>
                           <br>
                    <label for="enb-dis">WhatsApp Template</label>
                    <textarea
                        disabled
                        name="content"
                        >
                    Hi {customer_name}, we miss you.

You have left a product in your cart from {store_name}.

{discount_value_text} {discount_code_text}

Your order amount is {order_amount}.

{support_num}
{ab_link}
Click on the button below to complete the order

Checkout Now (WhatsApp Button)

Thanks,
Team {store_name}
                    </textarea>
                    <a href="/" target="_blank" class="preview">
                        Preview
                        <i
                            class="fa fa-external-link"
                            aria-hidden="true"
                            title="View"
                        ></i>
                    </a>
                      <br>
                     <label for="enb-dis">Send WhatsApp message after</label>

                            <select
                                name="app_status"
                            >
                                <option value="15 min">15 min</option>
                                <option value="30 min">30 min</option>
                                <option value="45 min">45 min</option>
                            </select>
                           <br>
                           <div class="ckeckbox_div">
                                <input
                                    type="checkbox"
                                    name="cancel_order"
                                />
                                <span>
                                    Include Discount
                                </span>
                            </div>
                </div>
            </div>
        </div>
   {{-- Abandoned Recovery Message End  --}}
   {{-- Order Tracking Message --}}
  <div class="grid-box">
            <div class="box left">
                <div class="text">
                    <h2>Order Tracking Message</h2>
                    <p>
                        A message is sent to the customer as soon as an order is fulfilled. Sending the order tracking URL on Whatsapp helps the customer track their order in real time, reducing “Where is my order?” support requests.
                    </p>

                </div>
            </div>
            <div class="box right">
                <div class="item">
                   <label for="enb-dis">Status</label>

                            <select
                                name="app_status"
                            >
                                <option value="Disable">Disable</option>
                                <option value="Enable">Enable</option>
                            </select>
                           <br>
                    <label for="enb-dis">WhatsApp Template</label>
                    <textarea
                        disabled
                        name="content"
                        >
                     Hi {customer_name},
Thank you for placing Order {order_id} with us
We know you've been excited about your order. Your order has been shipped by {carrier} with tracking number {tracking_number}.

Now, track your order in real-time by clicking on the link below
{tracking_url}

Thanks,
Team {store_name}
                    </textarea>
                    <a href="/" target="_blank" class="preview">
                        Preview
                        <i
                            class="fa fa-external-link"
                            aria-hidden="true"
                            title="View"
                        ></i>
                    </a>
                </div>
            </div>
        </div>
        {{-- Order Tracking Message End  --}}
      </div>