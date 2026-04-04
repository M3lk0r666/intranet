Prism.languages.cisco = {
    // 🔹 Prompt tipo Cisco
    prompt: /^[\w.-]+(?:\([^)]+\))?[#>]/m,

    // 🔹 Comentarios
    comment: /!.*/,

    // 🔹 Comandos principales
    "keyword-main":
        /\b(configure|enable|disable|exit|end|write|copy|reload|show|debug|no)\b/i,

    // 🔹 Protocolos / features
    protocol:
        /\b(ip|ospf|eigrp|bgp|vlan|spanning-tree|etherchannel|cdp|lldp)\b/i,

    // 🔹 Interfaces
    interface:
        /\b(interface\s+(gigabitethernet|fastethernet|ethernet|loopback|vlan)\S*)\b/i,

    // 🔹 IP address
    ip: /\b\d{1,3}(\.\d{1,3}){3}\b/,

    // 🔹 Máscara
    subnet: /\b(255\.){3}255\b|\b255\.255\.255\.0\b/,

    // 🔹 VLAN ID
    "vlan-id": /\bvlan\s+\d+\b/i,

    // 🔹 Números
    number: /\b\d+\b/,

    // 🔹 Estados
    state: /\b(up|down|administratively down|shutdown|no shutdown)\b/i,

    // 🔹 Strings
    string: /"[^"]*"|'[^']*'/,

    // 🔹 MAC
    mac: /\b[0-9a-f]{4}\.[0-9a-f]{4}\.[0-9a-f]{4}\b/i,

    // 🔹 Keywords secundarios
    keyword:
        /\b(address|network|mask|area|version|duplex|speed|description)\b/i,

    // 🔹 Errores
    error: /\b(invalid|error|failed|denied)\b/i,
};
