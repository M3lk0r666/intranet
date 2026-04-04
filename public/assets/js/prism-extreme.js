Prism.languages.extreme = {
    prompt: /^\S+#/m,
    comment: /#.*/,

    "keyword-main":
        /\b(configure|enable|disable|create|delete|show|set|clear|add|remove)\b/i,

    "config-object": /\b(vlan|port|interface|ethernet|lag|stack)\b/i,

    "attribute-specific": /\b(tag|ipaddress|description|speed|duplex)\b/i,

    "vlan-name": /\bvlan\s+\d+\b/i,
    "interface-name": /\b(port\s+\d+(-\d+)?)\b/i,

    ip: /\b\d{1,3}(\.\d{1,3}){3}\b/,
    mac: /\b[0-9a-f]{2}(:[0-9a-f]{2}){5}\b/i,

    "port-specifier": /\b\d+(-\d+)?\b/,

    state: /\b(enable|disable|up|down|active)\b/i,

    type: /\b(tagged|untagged)\b/i,

    string: /"[^"]*"|'[^']*'/,

    error: /\b(error|invalid|failed)\b/i,
};
