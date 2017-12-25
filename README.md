# enryETH
以太坊 以太币 ETH Ethereum restapi



EnrydeAir:eth-rest ac$ geth --rpc --rpcapi eth,web3,personal,miner,pxtool --rpcaddr 127.0.0.1 --rpcport 8545 --dev --datadir "dataroot/test" 
INFO [12-25|16:20:22] Using developer account                  address=0x52Af5B3208A1aD7a6F97b74F16b17a89CEb0782B
INFO [12-25|16:20:22] Starting peer-to-peer node               instance=Geth/v1.8.0-unstable-50df2b78/darwin-amd64/go1.9.2
INFO [12-25|16:20:22] Allocated cache and file handles         database=/Users/ac/ETHER/eth-rest/dataroot/test/geth/chaindata cache=128 handles=1024
INFO [12-25|16:20:22] Writing custom genesis block 
INFO [12-25|16:20:22] Initialised chain configuration          config="{ChainID: 1337 Homestead: 0 DAO: <nil> DAOSupport: false EIP150: 0 EIP155: 0 EIP158: 0 Byzantium: 0 Engine: clique}"
INFO [12-25|16:20:22] Initialising Ethereum protocol           versions="[63 62]" network=1
INFO [12-25|16:20:22] Loaded most recent local header          number=0 hash=b1b245…630577 td=1
INFO [12-25|16:20:22] Loaded most recent local full block      number=0 hash=b1b245…630577 td=1
INFO [12-25|16:20:22] Loaded most recent local fast block      number=0 hash=b1b245…630577 td=1
INFO [12-25|16:20:22] Regenerated local transaction journal    transactions=0 accounts=0
INFO [12-25|16:20:22] Starting P2P networking 
INFO [12-25|16:20:22] started whisper v.5.0 
INFO [12-25|16:20:22] RLPx listener up                         self="enode://1aaeb8c7e604f462731dd268b0636c586fd0881ebd069112a136247b429d62e4fce27efa77d91f10f4e61ab35249bd09d704a57eafe751d5ab1f71c13fd1f573@[::]:49684?discport=0"
INFO [12-25|16:20:22] IPC endpoint opened: /Users/ac/ETHER/eth-rest/dataroot/test/geth.ipc 
INFO [12-25|16:20:22] HTTP endpoint opened: http://127.0.0.1:8545 
INFO [12-25|16:20:22] Transaction pool price threshold updated price=18000000000
INFO [12-25|16:20:22] Etherbase automatically configured       address=0x52Af5B3208A1aD7a6F97b74F16b17a89CEb0782B
INFO [12-25|16:20:22] Starting mining operation 
INFO [12-25|16:20:22] Commit new mining work                   number=1 txs=0 uncles=0 elapsed=102.783µs
WARN [12-25|16:20:22] Block sealing failed                     err="waiting for transactions"
INFO [12-25|16:20:22] Mapped network port                      proto=tcp extport=49684 intport=49684 interface=NAT-PMP(192.168.1.1)
INFO [12-25|17:20:22] Regenerated local transaction journal    transactions=0 accounts=0
INFO [12-25|17:41:45] Submitted transaction                    fullhash=0xb8993e3c839004d25727d4d4eee8f035c5d55b540cbe1c6bce80f1fec7b57562 recipient=0x041AeD7eF9621fcd15bd1A5A1095034affaaE41C
INFO [12-25|17:41:45] Commit new mining work                   number=1 txs=1 uncles=0 elapsed=952.86µs
INFO [12-25|17:41:45] Successfully sealed new block            number=1 hash=c29359…7fee91
INFO [12-25|17:41:45] 🔨 mined potential block                  number=1 hash=c29359…7fee91
INFO [12-25|17:41:45] Commit new mining work                   number=2 txs=0 uncles=0 elapsed=1.299ms
WARN [12-25|17:41:45] Block sealing failed                     err="waiting for transactions"
INFO [12-25|17:45:14] Submitted transaction                    fullhash=0xebf253cf4c7fd4bf9d3b9828f20540fb83bbe6485c9896b120530cb032df4977 recipient=0x041AeD7eF9621fcd15bd1A5A1095034affaaE41C
INFO [12-25|17:45:14] Commit new mining work                   number=2 txs=1 uncles=0 elapsed=541.602µs
INFO [12-25|17:45:14] Successfully sealed new block            number=2 hash=b1b570…d3fda0
INFO [12-25|17:45:14] 🔨 mined potential block                  number=2 hash=b1b570…d3fda0
INFO [12-25|17:45:14] Commit new mining work                   number=3 txs=0 uncles=0 elapsed=618.046µs
WARN [12-25|17:45:14] Block sealing failed                     err="waiting for transactions"
INFO [12-25|17:45:16] Submitted transaction                    fullhash=0x59f1d6d8be2c92693c1fa7530bfd9f7f936339bc49fb70c8476ded1676410af7 recipient=0x041AeD7eF9621fcd15bd1A5A1095034affaaE41C
INFO [12-25|17:45:16] Commit new mining work                   number=3 txs=1 uncles=0 elapsed=501.277µs
INFO [12-25|17:45:16] Successfully sealed new block            number=3 hash=d92772…705a38
INFO [12-25|17:45:16] 🔨 mined potential block                  number=3 hash=d92772…705a38
INFO [12-25|17:45:16] Commit new mining work                   number=4 txs=0 uncles=0 elapsed=523.308µs
WARN [12-25|17:45:16] Block sealing failed                     err="waiting for transactions"
INFO [12-25|17:48:14] Submitted transaction                    fullhash=0xb534d78ed767e31cddf2f23ea03601bdceeaf477d669fdfd475610f693165794 recipient=0x041AeD7eF9621fcd15bd1A5A1095034affaaE41C
INFO [12-25|17:48:14] Commit new mining work                   number=4 txs=1 uncles=0 elapsed=617.086µs
INFO [12-25|17:48:14] Successfully sealed new block            number=4 hash=62bc8d…101987
INFO [12-25|17:48:14] 🔨 mined potential block                  number=4 hash=62bc8d…101987
INFO [12-25|17:48:14] Commit new mining work                   number=5 txs=0 uncles=0 elapsed=3.042ms
WARN [12-25|17:48:14] Block sealing failed                     err="waiting for transactions"
INFO [12-25|17:48:40] Submitted transaction                    fullhash=0x46a1a49b291470821d361d9d0397fab66e8b865a60e0fef85c1d87a31bcd7359 recipient=0x041AeD7eF9621fcd15bd1A5A1095034affaaE41C
INFO [12-25|17:48:40] Commit new mining work                   number=5 txs=1 uncles=0 elapsed=550.35µs
INFO [12-25|17:48:40] Successfully sealed new block            number=5 hash=497c7d…825f19
INFO [12-25|17:48:40] 🔨 mined potential block                  number=5 hash=497c7d…825f19
INFO [12-25|17:48:40] Commit new mining work                   number=6 txs=0 uncles=0 elapsed=1.055ms
WARN [12-25|17:48:40] Block sealing failed                     err="waiting for transactions"
