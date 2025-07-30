const settings = window.wc.wcSettings.getSetting('gopay_data', {});
const label = window.wp.htmlEntities.decodeEntities(settings.title) || window.wp.i18n.__('GoPay payment gateway', 'gopay-gateway');
const Content = () => {
	return window.wp.htmlEntities.decodeEntities(settings.description || '');
};

const GoPayGateway = {
	name: 'wc_gopay_gateway',
	label: label,
	content: window.wp.element.createElement(Content, null),
	edit: window.wp.element.createElement(Content, null),
	canMakePayment: () => true,
	ariaLabel: label,
	supports: {
		features: settings.supports,
	},
};

window.wc.wcBlocksRegistry.registerPaymentMethod(GoPayGateway);
