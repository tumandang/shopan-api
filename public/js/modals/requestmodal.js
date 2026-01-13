        function openViewModal(request) {

            document.getElementById('modal-request-id').textContent = '#RQ' + request.id;
            document.getElementById('modal-customer-name').textContent = request.user.name;
            document.getElementById('modal-customer-email').textContent = request.user.email || 'N/A';
            document.getElementById('modal-product-name').textContent = request.product_name;
            document.getElementById('modal-market-name').textContent = request.market_name;
            document.getElementById('modal-produt-url').setAttribute('href', request.product_url);
            document.getElementById('modal-quantity').textContent = request.quantity;
            document.getElementById('modal-price').textContent = '¥' + parseFloat(request.product_price).toLocaleString(
                'en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            document.getElementById('modal-created-date').textContent = new Date(request.created_at).toLocaleDateString(
                'en-GB');

            const total = request.quantity * request.product_price;
            document.getElementById('modal-total-amount').textContent = '¥' + total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });


            const statusBadge = document.getElementById('modal-status-badge');
            const status = request.status || 'new';
            const statusClasses = {
                'new': 'bg-blue-100 text-blue-800',
                'pending': 'bg-yellow-100 text-yellow-800',
                'processing': 'bg-purple-100 text-purple-800',
                'completed': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800'
            };
            statusBadge.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium capitalize ' + (
                statusClasses[status.toLowerCase()] || 'bg-gray-100 text-gray-800');
            statusBadge.textContent = status.charAt(0).toUpperCase() + status.slice(1);


            document.getElementById('view-modal').classList.remove('hidden');
            
        }

        function closeViewModal() {
            document.getElementById('view-modal').classList.add('hidden');
            document.getElementById('qoute-modal').classList.add('hidden');
            document.getElementById('reject-modal').classList.add('hidden');
        }

        function openQouteModal(request){
            document.getElementById('modal-request-name').textContent = request.product_name;
            document.getElementById('modal-request-market').textContent = request.market_name;
            document.getElementById('modal-request-quantity').textContent = request.quantity;
            document.getElementById('modal-request-url').setAttribute('href', request.product_url);
            document.getElementById('modal-request-notes-c').textContent = request.customer_notes || 'None';
            document.getElementById('price-product').setAttribute('value', '¥ '+ parseFloat(request.product_price).toLocaleString(
                'en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }));

            updateEstimatePrice(request);

            ['proxy-fee','domestic-ship'].forEach(id=>{
                document.getElementById(id).addEventListener('input', ()=> updateEstimatePrice(request));
            });
            document.getElementById('qoute-modal').classList.remove('hidden');
        }

        function openRejectModal(request){
            document.getElementById('reject-modal').classList.remove('hidden');
        }

        

        function updateEstimatePrice(request) {
            const proxyfee = parseFloat(document.getElementById('proxy-fee').value) || 0;
            const shippingdos = parseFloat(document.getElementById('domestic-ship').value) || 0;
            const quantity = parseFloat(request.quantity) || 0;
            const productPrice = parseFloat(request.product_price) || 0;
            const total = quantity * productPrice;
            const estimateprice = total + proxyfee + shippingdos;

            document.getElementById('estimate_price').textContent = '¥ ' + estimateprice.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            const convert = estimateprice * 0.026;
            
            document.getElementById('convert').textContent = 'RM ' +convert.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }




        document.getElementById('view-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeViewModal();
            }
        });


        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeViewModal();
            }
        });